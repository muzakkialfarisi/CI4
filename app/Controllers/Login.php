<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';
        echo view('Templates/Header', $data);
        echo view('login/login');
        echo view('Templates/Footer');
    }

    public function Auth()
    {
        
        if ($this->request->getMethod() === 'post') {
            $session = session();
            $model = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $data = $model->where('email', $email)->first();
            if($data){
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if($verify_pass){
                    $ses_data = [
                        'id'       => $data['id'],
                        'email'    => $data['email'],
                        'name'     => $data['name'],
                        'photo'     => $data['photo'],
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/dashboard');
                }else{
                    $session->setFlashdata('error', 'Wrong Password');
                    return redirect()->to('/login');
                }
            }else{
                $session->setFlashdata('login', 'Email not Found');
                return redirect()->to('/login');
            }
        }
        
    }
 
    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
