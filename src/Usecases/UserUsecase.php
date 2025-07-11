<?php
namespace App\Usecases;

use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class UserUsecase{

    static function createUser(string $name, UserGatewayInterface $gateway): void
    {
        
        $user = new User($name);
        $gateway->createUser($user);
    }

}

