<?php

use Bank\App\App;
use Bank\App\Message;
use Bank\App\Auth;
use Bank\App\Controllers\DBTypeController;

session_start();


require '../vendor/autoload.php';

define('DB_MARIA', 'maria');
define('DB_JSON', 'json');

DBTypeController::get();
Message::get();
Auth::get();

define('ROOT', __DIR__ . '/../'); //rodo kur musu visi faila sudeti
define('URL', 'http://bank.test'); //rodo, koks adresiukas




echo App::run();
