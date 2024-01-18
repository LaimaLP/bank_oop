<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use Bank\App\Message;
use App\DB\FileBase;
use Bank\App\Request\AccountUpdateRequest;
use Bank\App\Request\AccountUpdateWithdrawRequest;
use Bank\App\Request\NewAccountRequest;

class AddAccountController
{

    public function index($request)
    {

        $writer = new FileBase('members'); //1. sukuriame irasinetojo faila - objekta, pasileidzia konstruktorius is FileBase klases >> sugeneruojami du failai json ir -index.json
        //po tai kai susikuria objekta, writeris jau turi nusiskaites indeksa ir data(is constructorio).
        $members = $writer->showAll(); //tuomet tame sukurtame obj paleidziam showAll metoda ir perduodamas result i $colors (metodas aprasytas FileBase)


        $sort = $request['sort'] ?? null;
        if ($sort == 'size-asc') {
            usort($members, fn ($a, $b) => $a->lastname <=> $b->lastname);
            $sortValue = 'size-desc';
        } elseif ($sort == 'size-desc') {
            usort($members, fn ($a, $b) => $b->lastname <=> $a->lastname);
            $sortValue = 'size-asc';
        } else {
            $sortValue = 'size-asc';
        }

        $sort2 = $request['sort2'] ?? null;
        if ($sort2 == 'size-asc') {
            usort($members, fn ($a, $b) => $a->balance <=> $b->balance);
            $sortValue2 = 'size-desc';
        } elseif ($sort2 == 'size-desc') {
            usort($members, fn ($a, $b) => $b->balance <=> $a->balance);
            $sortValue2 = 'size-asc';
        } else {
            $sortValue2 = 'size-asc';
        }

        return App::view('addAccount/index', [
            'title' => 'Account List',
            'members' => $members,
            'sortValue' => $sortValue,
            'sortValue2' => $sortValue2,
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
        $name =  $request['name'] ?? null;
        $lastname =  $request['lastname'] ?? null;
        $PC =  $request['PC'] ?? null;
        $AC =  $request['AC'] ?? null;

        if (!NewAccountRequest::validate($request)) {
            return App::redirect("addAccount/create");
        }

        $writer = new FileBase('members');

        $members = $writer->showAll();

        foreach ($members as $member) {
            if ($PC == $member->PC) {
                Message::get()->Set('danger', 'Member with this personal code already exists');
                return App::redirect('addAccount/create');
            }
        }

        $writer->create((object) [
            'name' => $name,
            'lastname' => $lastname,
            'PC' => $PC,
            'AC' => $AC,
            'balance' => 0,
        ]);

        Message::get()->Set('success', 'Account was created');

        return App::redirect('addAccount');
    }


    public function confirmDelete($id)
    {
        return App::view('addAccount/confirmDelete', [
            'title' => 'Confirm Delete',
            'id' => $id
        ]);
    }

    public function destroy($id, $request)
    {

        $writer = new FileBase('members');
        $request = $writer->show($id);
        if ($request->balance == 0) {
            $writer->delete($id);
            Message::get()->set('info', 'Account was deleted');
        } else {
            Message::get()->set('danger', "Account is not empty.");
        }

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
        if (!AccountUpdateRequest::validate($request)) {
            return App::redirect("addAccount/edit/$id");
        }

        $addmoney = $request['addMoney'] ?? null;
        $writer = new FileBase('members');
        $userData = $writer->show($id);
        $userData->balance += $addmoney;
        $writer->update($id, $userData);
        Message::get()->set('success', "$addmoney" . '€ was added to ' . "$userData->name" . "'s account.");

        return App::redirect('addAccount');
    }
    public function withdraw($id)
    {
        $writer = new FileBase('members');
        $members = $writer->show($id);

        return App::view('addAccount/withdraw', [
            'title' => 'Withdraw funds',
            'members' => $members
        ]);
    }
    public function updateWithdraw($id, $request)
    {

        $withdrawMoney = $request['withdraw'] ?? null;

        $writer = new FileBase('members');
        $userData = $writer->show($id);

        if ($withdrawMoney <=  $userData->balance && $withdrawMoney > 0) {
            $userData->balance -= $withdrawMoney;
            $writer->update($id, $userData);
            Message::get()->set('success', "$withdrawMoney" . '€ was withdrawn from ' . "$userData->name" . "'s account.");
            return App::redirect('addAccount');
        }
        if (!AccountUpdateWithdrawRequest::validate($request, $userData)) {
            return App::redirect("addAccount/edit/$id");
        }
    }
}
