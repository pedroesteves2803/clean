<?php
namespace App\Controllers;

use App\Dto\DeleteUSerDTO;
use App\Dto\NewUserDTO;
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

    public function create(NewUserDTO $dto){
        try {

            $gateway = new UserGateway($this->dbConnectionInterface);
            $createUserUseCase = new CreateUserUseCase($gateway);

            $user = $createUserUseCase->execute($dto);

            $presenter = new UserPresenter();
            $presenter = $presenter->present([
                'id' => $user->getId(),
                'nome' => $user->getName()
            ]);

            return $presenter;
        } catch (\Throwable $e) {
            echo $e;
        }    
    }

    public function delete(DeleteUSerDTO $dto){
        try {

            $gateway = new UserGateway($this->dbConnectionInterface);
            $deleteUserUseCase = new DeleteUserUseCase($gateway);

            $deleteUserUseCase->execute($dto);
        } catch (\Throwable $e) {
        }    
    }
}
