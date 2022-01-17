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

    public function auth()
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

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';
        helper(['form']);
        if($this->request->getMethod() === 'post'){
            $model = new UserModel();
            $to = $this->request->getVar('email');
            $userdata = $model->where('email', $to)->first();
            if(!empty($userdata)){
                if($model->updatedAt($userdata['token'])){
                    $messege = '
                    <h3>You have requested to reset your password</h3>
                    <br>
                    Hi '. $userdata['name'] .'.
                    <br><br>
                    We cannot simply send you your old password. A unique link to reset your
                    password has been generated for you. To reset your password, click the
                    following button and follow the instructions with in 3mins.
                    <br><br>
                    <a href="http://localhost:8080/index.php/ForgotPassword/reset/'. $userdata['token'] .'" style="color:white; padding:3px; background: #4568DC; background: -webkit-linear-gradient(to right, #B06AB3, #4568DC); background: linear-gradient(to right, #B06AB3, #4568DC);">CLICK ME</a>';
        
                    $email = \Config\Services::email(); 
                    $email->setFrom('muzakkiahmad10071999@gmail.com', 'Muzakki Ahmad Al Farisi');
                    $email->setTo($to);
                    $email->setSubject("Password Reset Request");
                    $email->setMessage($messege);
        
                    if ($email->send()) {
                        return redirect()->back()->with('success', 'Request successful, please check your email and verify with in 3mins');
                    } else {
                        return redirect()->back()->with('error', 'Something wrong');
                    }
                }else{
                    return redirect()->back()->with('error','Sorry! Unable to update. try again');
                }
     
            }else{
                return redirect()->back()->withInput()->with('error','Email not Found');
            }
        }
        echo view('templates/header', $data);
        echo view('login/forgotPassword');
        echo view('templates/footer');
    }

    public function reset($token = null)
    {
        $data['title'] = 'Reset Password';
        helper(['form']);
        $model = new UserModel();
        if ($token){
            $userdata = $model->where('token', $token)->first();
            if (!empty($userdata)){
                if($this->checkExpiryDate($userdata['updated_at'])){
                    if($this->request->getMethod()=='post'){
                        $rules = [
                            'password'      => 'required|min_length[6]',
                            'confpassword'  => 'matches[password]'
                        ];
                        if($this->validate($rules)){
                            $password = password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);
                            if($model->updatePassword($token,$password)){
                                return redirect()->to('/')->with('success','Password updated successfully! Login now');
                            }
                            else{
                                return redirect()->back()->with('error','Sorry! Unable to update Password. Try again');
                            }
                        }else{
                            return redirect()->back()->with('error','Password must min 6 character and match');
                        }
                    }
                }else{
                    return redirect()->back()->with('error','Reset password link was expired');
                }
                
            }else{
                return redirect()->back()->with('error','Sorry! Unauthourized access');
            }
        }else{
            
            return redirect()->back()->with('error','Sorry! token not found');
        }
        echo view('templates/header', $data);
        echo view('login/resetPassword');
        echo view('templates/footer');
    }

    public function checkExpiryDate($time){
        $timeDiff = strtotime(date("Y-m-d h:i:s"))- strtotime($time);
        if($timeDiff < 180){
            return true;
        }
        else
        {
            return false;
        }
    }
 
    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
