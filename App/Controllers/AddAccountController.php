<?php

namespace Bank\App\Controllers;

use Bank\App\App;

class AddAccountController
{
    public function create()
    {
        return App::view('addAccount/create', [
            'title' => 'Create new account']);
    }

    public function store($request){

    }
}
