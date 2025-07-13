<?php
namespace App\Controllers;

use App\Gateway\UserGateway;
use App\Interfaces\DbConnectionInterface;
use App\Usecases\CreateUserUseCase;
use App\Usecases\UserUsecase;

class UserController{

    private CreateUserUseCase $usecase;

    public function __construct(CreateUserUseCase $usecase)
    {
        $this->usecase = $usecase;
    }

    public function create(string $name){
        
        $this->usecase->execute($name);
    }
}
