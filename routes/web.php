<?php

use App\Controllers\UserController;
use App\External\Database;
use App\Gateway\UserGateway;
use App\Usecases\CreateUserUseCase;
use App\Usecases\UserUsecase;

require_once '../src/Controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/user/create') {
    $name = $_GET['name'] ?? 'Pedro';
    $dbConnection = new Database(); // implementa DbConnectionInterface
    $gateway = new UserGateway($dbConnection); // implementa UserGatewayInterface
    $usecase = new CreateUserUseCase($gateway);
    $controller = new UserController($usecase);
    $controller->create($name);

} else {
    http_response_code(404);
    echo 'Página não encontrada';
}
