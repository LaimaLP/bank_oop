<?php

namespace Bank\App\Controllers;

use Bank\App\App;

class DBTypeController
{

    public static $DbType;

    public static function get()
    {
        return $_SESSION['DbType']['DbType'] ?? self::$DbType;
    }
    public function setDatabase($request)
    {
        if ($request['databasetype'] == "maria") {
            self::$DbType = DB_MARIA;
            $_SESSION['DbType'] = [
                'DbType' => 'maria',
            ];
        } else {
            self::$DbType = DB_JSON;
            $_SESSION['DbType'] = [
                'DbType' => 'json',
            ];
        }
        return App::redirect('addAccount');
    }
}
