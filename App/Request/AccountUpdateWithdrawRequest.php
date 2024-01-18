<?php

namespace Bank\App\Request;

use Bank\App\Message;

class AccountUpdateWithdrawRequest
{
    public static function validate($request, $userData)
    {
        $withdrawMoney = $request['withdraw'] ?? null;

        if (!is_numeric($withdrawMoney)) {
            Message::get()->set('danger', "Input must be a number.");
        } elseif ($withdrawMoney <= 0) {
            Message::get()->set('danger', "Input must be more than 0.");
        } elseif ($withdrawMoney >  $userData->balance) {
            Message::get()->set('danger', "The maximum debit amount is $userData->balance €.");
        }
        if (Message::get()->hasErrors()) {
            return false;
        }
        return true;
    }
}
