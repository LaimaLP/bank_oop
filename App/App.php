<?php

namespace Bank\App;
use Bank\App\Controllers\HomeController;
use Bank\App\Controllers\AddAccountController;
// use Bank\App\Controllers\LoginController;

class App{

    public static function run()
    {
        $server = $_SERVER['REQUEST_URI'];
        $url = explode('/', $server); //splitina stringa per /, arr[0] niekas, arr[1 ir kiti] jau reiksmes po /
        // print_r($url);
        array_shift($url); //kadangi visada pirmasis yra tuscias, ji pasalinam, toliau dirbam su arr.
        return self::router($url);
        
    }

    private static function router($url)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method == 'GET' && count($url) == 1 && $url[0] == '') {
            
            return (new HomeController)->index();
        }

        
        if ('GET' == $method && count($url) == 1 && $url[0] == 'addAccount') {
            return (new AddAccountController)->index($_GET);
        }

        if ($method == 'GET' && count($url) == 2 && $url[0] == 'addAccount' && $url[1] == 'create') {
            
            return (new AddAccountController)->create();
        }
        if ('POST' == $method && count($url) == 2 && $url[0] == 'addAccount' && $url[1] == 'store') {
            return (new AddAccountController)->store($_POST);
        }

        if ('POST' == $method && count($url) == 3 && $url[0] == 'addAccount' && $url[1] == 'destroy') {
            return (new AddAccountController)->destroy($url[2]); 
            // o ta treciaji pasiimam i destroy
        }
        if ('GET' == $method && count($url) == 3 && $url[0] == 'addAccount' && $url[1] == 'edit') {
            return (new AddAccountController)->edit($url[2]);
        }
        if ('POST' == $method && count($url) == 3 && $url[0] == 'addAccount' && $url[1] == 'update') {
            return (new AddAccountController)->update($url[2], $_POST);
        }
        if ('GET' == $method && count($url) == 3 && $url[0] == 'addAccount' && $url[1] == 'withdraw') {
            return (new AddAccountController)->withdraw($url[2]);
        }
        return '<h1>404</h1>';
    }


    public static function view($view, $data = [])
    {
        extract($data); //pvz i templeita perduodame koki kintamaji,pvz nr sugeneravimas yra kontrolerio reikalas/ 
                        //ten perduodamas,.. extraxteris extractina idx ir is tu idx padaro tokio pacio vardo kintamuosius
                         //ir kintamiesiems priskiria to indexo reiksme
                        //  print_r($data);
       //f-jos viduje atsiranda kintamasis homenumber
        ob_start(); //output buffer, niekas neiseina su echo. ATlaisvinamas arba kai pasibaigia scriptas arba visa turini surinkti i kintamaji content ir ta buferi istrinam
        require ROOT . 'views/top.php';
        require ROOT . "views/$view.php";
        require ROOT . 'views/bottom.php';
        $content = ob_get_clean();
        return $content; //contentas view grazina i kontroleri, kontroleris i routeri, routeris i run, o run isechoina
    }
    public static function redirect($url)
    {
        header('Location: '.URL.'/'.$url);
        return null;
    }
}