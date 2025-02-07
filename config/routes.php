<?php

use App\Controllers\Front\AuthController;
use App\Controllers\Front\HomeController;
use App\Controllers\Front\UserController;
use App\Controllers\Front\AdminController;
use App\Controllers\Back\DashboardController;

// Front Office Routes
$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/register', [AuthController::class, 'register']);
$router->add('POST', '/register', [AuthController::class, 'register']);
$router->add('GET', '/login', [AuthController::class, 'login']);
$router->add('POST', '/login', [AuthController::class, 'login']);
$router->add('GET', '/logout', [AuthController::class, 'logout']);

// the user routers
$router->add('GET', '/welcomeUser', [UserController::class, 'welcomeUser']);
$router->add('GET', '/welcomeAdmin', [AdminController::class, 'welcomeAdmin']);

// Back Office Routes
// $router->add('GET', '/admin/dashboard', [DashboardController::class, 'index']);
