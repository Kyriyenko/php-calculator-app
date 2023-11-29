<?php


namespace App\Controllers;


use App\View\View;

class  AppController
{

    public function index()
    {
        echo View::view('home');
    }

    public function save()
    {
       dd($_REQUEST);
    }
}


