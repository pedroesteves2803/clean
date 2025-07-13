<?php

use App\Controllers\UserController;
use App\External\Database;
use App\Gateway\UserGateway;
use App\Presenters\JsonUserPresenter;
use App\Usecases\CreateUserUseCase;
use App\Usecases\DeleteUserUseCase;

require_once '../src/Controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$dbConnection = new Database(); 
$gateway = new UserGateway($dbConnection);
$createUserUseCase = new CreateUserUseCase($gateway);
$deleteUserUseCase = new DeleteUserUseCase($gateway);
$jsonUserPresenter = new JsonUserPresenter();
$userController = new UserController($createUserUseCase, $deleteUserUseCase, $jsonUserPresenter);

if ($uri === '/user/create') {
    $name = $_GET['name'] ?? 'Pedro';
    $userController->create($name);

} elseif($uri === '/user/delete'){
    $id = $_GET['id'] ?? 0;
    $userController->delete($id);
}else {
    http_response_code(404);
    echo 'Página não encontrada';
}
