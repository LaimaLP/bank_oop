<?php
//gana esminis dalykas
namespace Bank\App\Controllers;

use Bank\App\App;

class HomeController
{
    public function index()
    {
        //i templeita perduodame data
        return App::view('home',[
            'title' => "Future Bank"
            
        ]);
    }
 
}
