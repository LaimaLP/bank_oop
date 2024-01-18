<?php

namespace Bank\App\Request;
use Bank\App\Message;

class AccountUpdateRequest
{
    public static function validate($request)
    {
        $addmoney = $request['addMoney'] ?? null;

        if (!is_numeric($addmoney)) {
            Message::get()->set('danger', "Input must be a number.");
        } elseif ($addmoney <= 0) {
            Message::get()->set('danger', "Input must be more than 0.");
        }
        if (Message::get()->hasErrors()) {
            return false;
        }
        return true;
    }
}
