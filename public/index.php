<?php

use Bank\App\App;
require '../vendor/autoload.php';

define('ROOT', __DIR__ . '/../'); //rodo kur musu visi faila sudeti
define('URL', 'http://bank.test'); //rodo, koks adresiukas


 echo App::run();
