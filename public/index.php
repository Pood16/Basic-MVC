<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;
use Dotenv\Dotenv;
use App\Core\Database;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// CONNECT TO DATABASE 
Database::init();



// Load routes
require_once __DIR__ . '/../config/routes.php';




