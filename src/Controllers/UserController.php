<?php
namespace App\Controllers;

use App\Gateway\UserGateway;
use App\Interfaces\DbConnectionInterface;
use App\Interfaces\UserPresenterInterface;
use App\Presenters\UserPresenter;
use App\Usecases\CreateUserUseCase;
use App\Usecases\DeleteUserUseCase;

class UserController{

    private DbConnectionInterface $dbConnectionInterface;

    public function __construct(
        DbConnectionInterface $dbConnectionInterface
    )
    {
        $this->dbConnectionInterface = $dbConnectionInterface;
    }

    public function create(string $name){
        try {

            $gateway = new UserGateway($this->dbConnectionInterface);
            $createUserUseCase = new CreateUserUseCase($gateway);

            $user = $createUserUseCase->execute($name);

            $presenter = new UserPresenter();
            $data = $presenter->present([
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
