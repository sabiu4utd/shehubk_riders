<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Authentications 
$routes->get('/', 'Auth::index');
$routes->get('register', 'Auth::register');
$routes->post('signup', 'Auth::signup');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

//Admin

$routes->get('admin', 'Admin::index');




//Drier
$routes->get('driver', 'Driver::index');



//Rider
$routes->get('rider', 'Rider::index');




