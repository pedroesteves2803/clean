<?php
namespace App\Controllers;

use App\Gateway\UserGateway;
use App\Interfaces\DbConnectionInterface;
use App\Interfaces\UserPresenterInterface;
use App\Usecases\CreateUserUseCase;
use App\Usecases\DeleteUserUseCase;

class UserController{

    private DbConnectionInterface $dbConnectionInterface;
    private UserPresenterInterface $presenter;

    public function __construct(
        UserPresenterInterface $userPresenterInterface,
        DbConnectionInterface $dbConnectionInterface
    )
    {
        $this->presenter = $userPresenterInterface;
        $this->dbConnectionInterface = $dbConnectionInterface;
    }

    public function create(string $name){
        try {

            $gateway = new UserGateway($this->dbConnectionInterface);
            $createUserUseCase = new CreateUserUseCase($gateway);

            $user = $createUserUseCase->execute($name);

            $data = $this->presenter->present([
                'id' => $user->getId(),
                'nome' => $user->getName()
            ]);

            header('Content-Type: application/json');
            echo json_encode($data);

        } catch (\Throwable $e) {
            echo $e;
        }    
    }

    public function delete(int $id){
        try {

            $gateway = new UserGateway($this->dbConnectionInterface);
            $deleteUserUseCase = new DeleteUserUseCase($gateway);

            $deleteUserUseCase->execute($id);

            header('Content-Type: application/json');
            echo json_encode(['message' => 'Usuario deletado com sucesso.']);
        } catch (\Throwable $e) {
        }    
    }
}
