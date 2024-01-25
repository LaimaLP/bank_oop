<?php

namespace Bank\App\Controllers;

use Bank\App\App;

class DBTypeController
{

    // private static $DbType=DB_MARIA;
    private static $DbObj;
    private  $DbType;

    public static function get()
    {
        return self::$DbObj ?? self::$DbObj = new self;
        // return  $_SESSION['DbType'] ?? self::$DbType;
    }

    private function __construct()
    { //konstruoja zinutes
        if (isset($_SESSION['DbType'])) {
            $this->DbType = $_SESSION['DbType']; //is message paima message ir ji uzsetina
            unset($_SESSION['DbType']);
          
        }else{
            $this->DbType = DB_MARIA;
        }

    }

    public function getDbType()
    {
        return $this->DbType ?? DB_MARIA;
    }



    public function setDatabase($request)
    {
        $this->DbType = $request['databasetype'];
        $_SESSION['DbType'] = $request['databasetype'];

        return App::redirect('addAccount');
    }
}
