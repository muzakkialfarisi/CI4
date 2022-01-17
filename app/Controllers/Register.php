<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        $data['title'] = 'Register';
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email'         => 'required|valid_email|is_unique[users.email]',
                'name'          => 'required',
                'password'      => 'required|min_length[6]',
                'confpassword'  => 'matches[password]',
                'gambar' => [
                    'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,1024]'
                ]
            ];
             
            if($this->validate($rules)){
                $model = new UserModel();
    
                $file = $this->request->getFile('gambar');
                $fileName = time().$file->getClientName();
                $file->move('uploads/photo_profile', $fileName);
                $token = md5(str_shuffle('abcsefghijklmonpqrtuvwxyz'.time()));
                $data = [
                    'email'    => $this->request->getVar('email'),
                    'name'     => $this->request->getVar('name'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token'    => $token,
                    'photo'    => $fileName,
                    'created_at' => date("Y-m-d h:i:s")
                ];
                $model->save($data);
                return redirect()->to('/')->with('success', 'Your account has been saved successfully');
            }else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('templates/header', $data);
        echo view('register/register');
        echo view('templates/footer');
    }

}
