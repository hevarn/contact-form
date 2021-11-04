<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('PUBLIC', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Public' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('CERTIFICATE', dirname(__DIR__). DIRECTORY_SEPARATOR.'certificate'. DIRECTORY_SEPARATOR);
define('VENDOR', dirname(__DIR__). DIRECTORY_SEPARATOR.'vendor'. DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get("/", "App\GeneralController@index");
$router->post('/valide','App\GeneralController@send');
$router->get('/contact','\App\GeneralController@contact');


try {
    $router->run();
} catch (\Exception $e) {
    $e->getMessage();
}
