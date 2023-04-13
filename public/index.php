<?php
//autoload.ph will load every class from any directory based the namespace name
require '../autoload.php';

//creates instance of the IJDB class (controller & routes)
$routes = new \portal\Routes();

$entryPoint = new \as2\EntryPoint($routes);

$entryPoint->run();


?>

