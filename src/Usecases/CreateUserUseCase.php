<?php
namespace App\Usecases;

use App\Dto\NewUserDTO;
use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class CreateUserUseCase{

    private UserGatewayInterface $gateway;

    public function __construct(UserGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(NewUserDTO $dto): User
    {
        $user = new User($dto->name);
        $newUser = $this->gateway->createUser($user);

        return $newUser;
    }

}

