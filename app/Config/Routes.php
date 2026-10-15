<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::home');
$routes->get('/about', 'Pages::about');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/profile', 'Pages::profile');
$routes->get('/customer-accounts', 'CustomerAccounts::index');
$routes->match(['get', 'post'], '/customers/new', 'CustomerAccounts::new');
$routes->match(['get', 'post'], '/customers/(:num)/edit', 'CustomerAccounts::edit/$1');
$routes->get('/user-accounts', 'UserAccounts::index');
$routes->match(['get', 'post'], '/users/new', 'UserAccounts::new');
$routes->match(['get', 'post'], '/users/(:num)/edit', 'UserAccounts::edit/$1');
