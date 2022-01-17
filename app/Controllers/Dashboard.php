<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        echo view('Templates/Header', $data);
        echo view('Dashboard');
        echo view('Templates/Footer');
    }

}
