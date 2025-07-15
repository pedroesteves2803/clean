<?php
namespace App\Usecases;

use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class CreateUserUseCase{

    private UserGatewayInterface $gateway;

    public function __construct(UserGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(string $name): User
    {
        $user = new User($name);
        $idUSer = $this->gateway->createUser($user);

        $user->setId($idUSer);

        return $user;
    }

}

