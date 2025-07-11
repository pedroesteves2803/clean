<?php
namespace App\Usecases;

use App\Entities\User;
use UserGatewayInterface;

class UserUsecase{

    static function createUser(string $name, UserGatewayInterface $gateway){
        
        $user = new User($name);
        $gateway->createUser($user);
    }

}

