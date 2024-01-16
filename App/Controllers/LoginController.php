<?php
//gana esminis dalykas
namespace Bank\App\Controllers;
use Bank\App\App;
use Bank\App\Auth;
use Bank\App\Message;


class LoginController{
    public function index()
    {
        //i templeita perduodame data
        return App::view('login/login',[
            'title' => 'Login'
        ]);
    }
    public function login($request)
    {
        $email = $request['email'] ?? '';
        $password = $request['password'] ?? '';

      
        if(Auth::get()->tryLoginUser($email, $password)){
            Message::get()->set('success', 'You are logged in');
            return App::redirect('addAccount');
        }
    
        Message::get()->set('danger', 'Wrong email or password');
        return App::redirect('login');
    }
    public function logout() {
        Auth::get()->logout();
        Message::get()->set('success', 'You are logged out');
        return App::redirect('login');
    }
}