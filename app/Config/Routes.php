<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Authentications 
$routes->get('/', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->get('register', 'Auth::register');
$routes->post('signup', 'Auth::signup');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/logout', 'Auth::logout');

//Admin

$routes->get('admin', 'Admin::index');
$routes->get('admin/users', 'Admin::users');
$routes->get('admin/rides', 'Admin::rides');
$routes->get('admin/settings', 'Admin::settings');


//Drier
$routes->get('driver', 'Driver::index');
$routes->get('driver/requests', 'Driver::requests');
$routes->get('driver/history', 'Driver::history');
$routes->get('driver/earnings', 'Driver::earnings');
$routes->get('driver/profile', 'Driver::profile');




//Rider
$routes->get('rider', 'Rider::index');
$routes->get('rider/rides', 'Rider::rides');
$routes->get('rider/book', 'Rider::book');
$routes->get('rider/payments', 'Rider::payments');
$routes->get('rider/profile', 'Rider::profile');






