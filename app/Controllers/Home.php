<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        echo view('templates/header', $data);
        echo view('dashboard');
        echo view('templates/footer');
    }
}
