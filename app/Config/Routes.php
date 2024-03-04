<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route to show login form and handle login/logout
$routes->get('/login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

// Routes for user management
$routes->get('user', 'User::index');
$routes->get('user/add', 'User::add');
$routes->post('user/create', 'User::create');
$routes->get('user/edit/(:segment)', 'User::edit/$1');
$routes->post('user/update/(:segment)', 'User::update/$1');
$routes->get('user/delete/(:segment)', 'User::delete/$1');
