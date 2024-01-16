<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use App\DB\FileBase;


class AddAccountController
{

    public function index($request)
    {

        $writer = new FileBase('members'); //1. sukuriame irasinetojo faila - objekta, pasileidzia konstruktorius is FileBase klases >> sugeneruojami du failai json ir -index.json
        //po tai kai susikuria objekta, writeris jau turi nusiskaites indeksa ir data(is constructorio).
        $members = $writer->showAll(); //tuomet tame sukurtame obj paleidziam showAll metoda ir perduodamas result i $colors (metodas aprasytas FileBase)

        //tuomet paleidziamas templatas ->colors/index . tam failui perduodami du kintamieji:title ir colors. colors foreachina datai renderinti
        return App::view('addAccount/index', [
            'title' => 'Account List',
            'members' => $members,
        ]);
    }

    public function create()
    {
        return App::view('addAccount/create', [
            'title' => 'Create new account',

        ]);
    }

    public function store($request)
    {
        $AC = "LT" . rand(10 ** 17, 10 ** 18 - 1);
        $name =  $request['name'] ?? null;
        $lastname =  $request['lastname'] ?? null;
        $PC =  $request['PC'] ?? null;

        $writer = new FileBase('members');

        $writer->create((object) [
            'name' => $name,
            'lastname' => $lastname,
            'PC' => $PC,
            'AC' => $AC,
            'balance' => 0,
        ]);
        return App::redirect('addAccount');
    }

    public function destroy($id)
    {

        $writer = new FileBase('members');
        $writer->delete($id);

        return App::redirect('addAccount');
    }

    public function edit($id)
    {

        $writer = new FileBase('members');
        $members = $writer->show($id);

        return App::view('addAccount/edit', [
            'title' => 'Edit account',
            'members' => $members
        ]);
    }
    public function update($id, $request)
    {

        $balance = $request['balance'] ?? null;
        $addmoney = $request['addMoney'] ?? null;

        $writer = new FileBase('members');
        $writer->update($id, (object) [
            
            'balance' => $balance += $addmoney,
        ]);
        return App::redirect('addAccount');

    }
    public function withdraw($id){
        $writer = new FileBase('members');
        $members = $writer->show($id);

        return App::view('addAccount/withdraw', [
            'title' => 'Withdraw funds',
            'members' => $members
        ]);
    }

}
