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
$routes->get('admin/users', 'Admin::users');
$routes->get('admin/rides', 'Admin::rides');
$routes->get('admin/settings', 'Admin::settings');






//Drier
$routes->get('driver', 'Driver::index');



//Rider
$routes->get('rider', 'Rider::index');
$routes->get('rider/rides', 'Rider::rides');
$routes->get('rider/book', 'Rider::book');
$routes->get('rider/payments', 'Rider::payments');
$routes->get('rider/profile', 'Rider::profile');







