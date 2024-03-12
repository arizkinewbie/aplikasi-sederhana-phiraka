<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Routes to show login form and handle login/logout
$routes->get('/login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

// Routes for user management
$routes->group('user', ['filter' => 'login'], function ($routes) {
    $routes->get('', 'User::index');
    $routes->get('add', 'User::add');
    $routes->post('create', 'User::create');
    $routes->get('edit/(:num)', 'User::edit/$1');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});
