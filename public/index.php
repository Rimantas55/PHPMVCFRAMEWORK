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

// echo get_class($router);

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    
// Display the routing table
// echo '<pre>';
// var_dump($router->getRoutes());
// echo '</pre>';

 $url = $_SERVER['QUERY_STRING'];

 if ($router->match($url)) {
  echo '<pre>' . "---------------</br>";
  var_dump($router->getParams());
  echo '</pre>';
 } else {
   echo "No route found for URL '$url'" ; // later will be error 404
 }