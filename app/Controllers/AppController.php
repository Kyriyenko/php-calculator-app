<?php


namespace App\Controllers;


use App\Models\UserModel;
use App\View\View;

class  AppController
{

    public function index()
    {
        echo View::view('home');
    }

    public function save()
    {
        $user = new UserModel();

        $user->insert([
            'firstName' => $_REQUEST['first_name'] ?? '',
            'secondName' => $_REQUEST['second_name'] ?? '',
            'password' => $_REQUEST['password'] ?? '',
            'email' => $_REQUEST['email'] ?? '',
        ]);
    }
}


