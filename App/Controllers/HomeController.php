<?php
//gana esminis dalykas
namespace Bank\App\Controllers;

use Bank\App\App;

class HomeController
{
    public function index()
    {
        return App::view('home',[
            'title' => "Future Bank"
            
        ]);
    }
 
}
