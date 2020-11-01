<?php

/* Front controller */
 //? echo 'Current PHP version: ' . phpversion();
 //? PHP version: 7.2.10
 //? How to catch Request URL: // echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

 /**
  * Routing
  */
require '../Core/Router.php';
$router = new Router();

echo get_class($router);