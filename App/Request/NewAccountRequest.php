<?php

namespace Bank\App\Request;
use Bank\App\Message;

class NewAccountRequest
{
    public static function validate($request)
    {
        $PC =  $request['PC'] ?? null;

        if (strlen($request['name']) < 4 || strlen($request['lastname']) < 4) {
            Message::get()->Set('danger', 'User name and last name must be more than three letters.');
        }

        $pirmasDigit = substr($PC, 0, 1);
        $menuoDigit = substr($PC, 3, 2);
        $dienaDigit = substr($PC, 5, 2);
        if (
            strlen($PC) > 11 ||
            strlen($PC) < 11 ||
            $pirmasDigit < 2 || $pirmasDigit > 6 ||
            $menuoDigit > 12 ||
            $dienaDigit > 31
        ) {
            Message::get()->Set('danger', 'Invalid personal code. ');
        }

        if (Message::get()->hasErrors()) {
            return false;
        }
        return true;
    }
}
