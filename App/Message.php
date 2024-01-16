<?php 
namespace Bank\App;

//veiks kaip servisas
class Message{
    private static $message;
    private $show;
    public static function get(){
        return self::$message ?? self::$message = new self;
    }

    private function __construct(){
        if(isset($_SESSION['message'])){
            $this->show = $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
    public function show(){
        return $this->show ?? false;
    }

    public function set($type = 'succes', $message ){
        $_SESSION['message'] = [
            'text'=> $message,
            'type'=>$type
        ];
    }

}