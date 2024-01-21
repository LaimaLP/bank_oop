<?php

namespace Bank\App\Request;

use Bank\App\Message;

class AccountUpdateRequest
{
    public static function validate($request, $userData)
    {
        $withdrawMoney = $request['withdraw'] ?? null;
        $addmoney = $request['addMoney'] ?? null;

        if ($withdrawMoney) {
            if (!is_numeric($withdrawMoney)) {
                Message::get()->set('danger', "Input must be a number.");
            } elseif ($withdrawMoney <= 0) {
                Message::get()->set('danger', "Input must be more than 0.");
            } elseif ($withdrawMoney >  $userData->balance) {
                Message::get()->set('danger', "The maximum debit amount is $userData->balance €.");
            }
        } elseif ($addmoney) {
            if (!is_numeric($addmoney)) {
                Message::get()->set('danger', "Input must be a number.");
            } elseif ($addmoney <= 0) {
                Message::get()->set('danger', "Input must be more than 0.");
            }
        }
        if (Message::get()->hasErrors()) {
            return false;
        }
        return true;
    }
}
