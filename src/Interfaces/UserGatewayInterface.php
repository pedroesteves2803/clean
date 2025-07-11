<?php
namespace App\Interfaces;

use App\Entities\User;

interface UserGatewayInterface{

    public function createUser(User $user): void;

}