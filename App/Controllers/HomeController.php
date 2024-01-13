<?php
//gana esminis dalykas
namespace Bank\App\Controllers;

use Bank\App\App;


class HomeController
{
    public function index()
    {
        $greet = ['labas','hello', 'bonjure'];
        //i templeita perduodame data
        return App::view('test',[
            'text' => $greet[rand(0, count($greet)-1)],
            'title' => "Future Bank"
            
        ]);
    }
 
}
