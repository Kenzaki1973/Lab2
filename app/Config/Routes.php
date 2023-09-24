<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'MainController::index');
$routes->get('/searchsong', 'MainController::searchsong');
$routes->post('/addsong', 'MainController::addsong');
$routes->post('/createplaylist', 'MainController::createplaylist');
$routes->get('/deleteplaylist/(:num)', 'MainController::deleteplaylist/$1');
$routes->get('/selectedplaylist/(:any)', 'MainController::selectedplaylist/$1');
$routes->get('/addmusictoplaylist/(:num)', 'MainController::addmusictoplaylist/$1');
$routes->get('/removemusicfromplaylist/(:num)', 'MainController::removemusicfromplaylist/$1');