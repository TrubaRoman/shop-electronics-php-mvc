<?php
//Загальні настройтки

//patern "singelton"

ini_set('display_errors', 1);//під час продакшину змінити
error_reporting(E_ALL);
session_start();
//підключення файлів системи
define('ROOT',dirname(__FILE__));//обявимо константу з директорією
//require_once(ROOT.'/components/Router.php');//підключимо роутер
require_once(ROOT.'/components/Autoload.php');
// підключення дб
//require_once(ROOT.'/components/Db.php');
// виклик Router

$router = new Router();
$router->run();

