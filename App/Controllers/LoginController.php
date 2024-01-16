<?php
//gana esminis dalykas
namespace Bank\App\Controllers;
use Bank\App\App;

class LoginController{
    public function login()
    {
        //i templeita perduodame data
        return App::view('login/login',[
            'title' => 'Log In'
        ]);
    }
    public function register()
    {
        //i templeita perduodame data
        return App::view('login/register',[
            'title' => 'Register'
        ]);
    }
}