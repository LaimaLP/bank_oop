<?php

namespace Bank\App\Controllers;

use Bank\App\App;
use Bank\App\Message;
use App\DB\FileBase;
use Bank\App\Request\AccountUpdateRequest;
use Bank\App\Request\NewAccountRequest;
use App\DB\MariaBase;


class AddAccountController
{

    public function index($request)
    {

        // $writer = new FileBase('members'); //1. sukuriame irasinetojo faila - objekta, pasileidzia konstruktorius is FileBase klases >> sugeneruojami du failai json ir -index.json
        //po tai kai susikuria objekta, writeris jau turi nusiskaites indeksa ir data(is constructorio).
        $db = DBTypeController::get()->getDbType();
        $writer = match ($db) {
            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };

        $category = $request['category']?? null;
     
        if($category == "woman"){
            $members = $writer->getByFilter('PC',"4%");
        } elseif($category == "man"){
            $members = $writer->getByFilter('PC',"3%");
        } elseif($category == "zero"){
            $members = $writer->getByFilter('balance',"0%");
        }else{
            $members = $writer->showAll();
        }


        // $members = $writer->showAll(); //tuomet tame sukurtame obj paleidziam showAll metoda ir perduodamas result i $colors (metodas aprasytas FileBase)

        if ($db == DB_MARIA) {
            $totalBalance = (int)$writer->getTotalBalance()->{'totalBalance'};
            $totalClient = $writer->getTotalBalance()->{'count'};
            $balanceAverage = (int)$writer->getTotalBalance()->{'average'};
            $minBalance = $writer->getTotalBalance()->{'min'};
            $maxBalance = $writer->getTotalBalance()->{'max'};

           
        }


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
            'totalBalance' => $totalBalance ?? 0,
            'totalClient' => $totalClient ?? 0,
            'balanceAverage' =>$balanceAverage ?? 0,
            'minBalance' =>$minBalance ?? 0,
            'maxBalance' =>$maxBalance ?? 0,
            'db' => $db,
            'category'=>$category ?? 0,
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

        // $writer = new FileBase('members');

        // $writer = match(DB) {
        //     'file' => new FileBase('members'),
        //     'maria' => new MariaBase('accounts'),
        // };


        $writer = match (DBTypeController::get()->getDbType()) {

            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };
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

        // $writer = new FileBase('members');

        // $writer = match(DB) {
        //     'file' => new FileBase('members'),
        //     'maria' => new MariaBase('accounts'),
        // };

        $writer = match (DBTypeController::get()->getDbType()) {

            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };


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

        // $writer = new FileBase('members');



        // $writer = match(DB) {
        //     'file' => new FileBase('members'),
        //     'maria' => new MariaBase('accounts'),
        // };


        $writer = match (DBTypeController::get()->getDbType()) {

            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };

        $members = $writer->show($id);
        return App::view('addAccount/edit', [
            'title' => 'Edit account',
            'members' => $members
        ]);
    }

    public function update($id, $request)
    {

        // $writer = new FileBase('members');


        // $writer = match(DB) {
        //     'file' => new FileBase('members'),
        //     'maria' => new MariaBase('accounts'),
        // };

        $writer = match (DBTypeController::get()->getDbType()) {

            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };

        $userData = $writer->show($id);

        if (!AccountUpdateRequest::validate($request, $userData)) {
            if ($request['withdraw']) {
                return App::redirect("addAccount/withdraw/$id");
            } elseif ($request['addMoney']) {
                return App::redirect("addAccount/edit/$id");
            }
        }

        if ($withdrawMoney = $request['withdraw']) {

            if ($withdrawMoney <=  $userData->balance && $withdrawMoney > 0) {
                $userData->balance -= $withdrawMoney;
            }
        } elseif ($addmoney = $request['addMoney']) {
            $userData->balance += $addmoney;
        }
        $writer->update($id, $userData);

        if ($withdrawMoney) {
            Message::get()->set('warning', "$withdrawMoney" . '€ was withdrawn from ' . "$userData->lastname" . " account.");
        } elseif ($addmoney) {
            Message::get()->set('success', "$addmoney" . '€ was added to ' . "$userData->lastname" . " account.");
        }


        return App::redirect('addAccount');
    }
    public function withdraw($id)
    {
        // $writer = new FileBase('members');

        // $writer = match(DB) {
        //     'file' => new FileBase('members'),
        //     'maria' => new MariaBase('accounts'),
        // };
        $writer = match (DBTypeController::get()->getDbType()) {

            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };



        $members = $writer->show($id);

        return App::view('addAccount/withdraw', [
            'title' => 'Withdraw funds',
            'members' => $members
        ]);
    }
}
