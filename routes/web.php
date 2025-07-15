<?php

use App\Controllers\UserController;
use App\External\Database;
use App\Presenters\UserPresenter;

require_once '../src/Controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$dbConnection = new Database(); 

$userController = new UserController(  
    $dbConnection
);

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
