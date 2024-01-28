<?php

namespace Bank\App\Controllers;

use Bank\App\App;

class DBTypeController
{
    private static $DbObj;
    private  $DbType;

    public static function get()
    {
        return self::$DbObj ?? self::$DbObj = new self;
    }

    private function __construct()
    { 
        if (isset($_SESSION['DbType'])) {
            $this->DbType = $_SESSION['DbType']; 
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
