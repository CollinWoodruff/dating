<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 4/29/2020
 * Time: 10:10 AM
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload
require_once('vendor/autoload.php');
require_once("model/data-layer.php");

session_start();



//Create an instance of the Base Class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

$validator = new validator();
$controller = new indexController($f3, $validator);

//Default route
$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

//Order route
$f3->route('GET|POST /date', function() {
    $GLOBALS['controller']->date();
});

//Order2 route
$f3->route('GET|POST /date2', function() {
    $GLOBALS['controller']->date2();
});

//Order route
$f3->route('GET|POST /date3', function() {
    $GLOBALS['controller']->date3();
});

//Summary page
$f3->route('GET /summary', function() {
    $GLOBALS['controller']->summary();
});

//Run fat free
$f3->run();