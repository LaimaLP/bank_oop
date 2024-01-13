<?php

namespace Bank\App;
use Bank\App\Controllers\HomeController;
class App{

    public static function run()
    {
        $server = $_SERVER['REQUEST_URI'];
        $url = explode('/', $server); //splitina stringa per /, arr[0] niekas, arr[1 ir kiti] jau reiksmes po /
        print_r($url);
        array_shift($url); //kadangi visada pirmasis yra tuscias, ji pasalinam, toliau dirbam su arr.
        return self::router($url);
        
    }

    private static function router($url)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method == 'GET' && count($url) == 1 && $url[0] == '') {
            
            return (new HomeController)->index();
        }
      
        return '<h1>404</h1>';
    }


    public static function view($data = [])
    {
        extract($data); //pvz i templeita perduodame koki kintamaji,pvz nr sugeneravimas yra kontrolerio reikalas/ 
                        //ten perduodamas,.. extraxteris extractina idx ir is tu idx padaro tokio pacio vardo kintamuosius
                         //ir kintamiesiems priskiria to indexo reiksme
                        //  print_r($data);
       //f-jos viduje atsiranda kintamasis homenumber
        ob_start(); //output buffer, niekas neiseina su echo. ATlaisvinamas arba kai pasibaigia scriptas arba visa turini surinkti i kintamaji content ir ta buferi istrinam
        require ROOT . 'views/top.php';
        require ROOT . "views/test.php";
        require ROOT . 'views/bottom.php';
        $content = ob_get_clean();
        return $content; //contentas view grazina i kontroleri, kontroleris i routeri, routeris i run, o run isechoina
    }
}