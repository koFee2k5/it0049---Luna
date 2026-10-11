<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::home');
$routes->get('/about', 'Pages::about');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/profile', 'Pages::profile');
$routes->get('/customer-accounts', 'CustomerAccounts::index');
$routes->get('/user-accounts', 'UserAccounts::index');
