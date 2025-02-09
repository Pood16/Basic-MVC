<?php
use App\Core\Router;
use App\Controllers\Front\AuthController;
use App\Controllers\Front\HomeController;
use App\Controllers\Front\UserController;
use App\Controllers\Front\AdminController;
use App\Controllers\Back\DashboardController;


$router = new Router();


// for testing 
$router->add('GET', '/lahcen/ouirghane/{12}', [HomeController::class, 'index']);

// Front Office Routes
$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/register', [AuthController::class, 'register']);
$router->add('POST', '/register', [AuthController::class, 'register']);
$router->add('GET', '/login', [AuthController::class, 'login']);
$router->add('POST', '/login', [AuthController::class, 'login']);
$router->add('GET', '/logout', [AuthController::class, 'logout']);

// the user routers
$router->add('GET', '/user', [UserController::class, 'user']);
$router->add('GET', '/admin', [AdminController::class, 'admin']);

// Back Office Routes


// $router->add('GET', '/admin/dashboard', [DashboardController::class, 'index']);


$router->dispatch();



