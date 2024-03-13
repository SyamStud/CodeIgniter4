<?php

use App\Controllers\Labs;
use App\Controllers\Pages;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->view('logging', 'Labs/logging');
$routes->view('table', 'Labs/table');
$routes->view('query', 'Labs/query');

$routes->get('labs', [Labs::class, 'index']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

