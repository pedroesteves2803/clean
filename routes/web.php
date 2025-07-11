<?php

use App\Controllers\UserController;
use App\External\Database;

require_once '../src/Controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/home') {
    require_once '../src/Controllers/HomeController.php';
} elseif ($uri === '/sobre') {
    echo 'Página Sobre';
} elseif ($uri === '/db') {
    require_once '../public/test-db.php';
} elseif ($uri === '/user/create') {
    $name = $_GET['name'] ?? 'Pedro';

    $dbConnection = new Database(); 
    $controller = new UserController($dbConnection);
    $controller->create($name, $dbConnection);
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}
