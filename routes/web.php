<?php

use App\Controllers\UserController;
use App\Dto\NewUserDTO;
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

    $dto = new NewUserDTO($name);

    $presenter = $userController->create($dto);

    header('Content-Type: application/json');
    echo json_encode($presenter);

} elseif($uri === '/user/delete'){
    $id = $_GET['id'] ?? 0;
    $userController->delete($id);

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Usuario deletado com sucesso.']);
}else {
    http_response_code(404);
    echo 'Página não encontrada';
}
