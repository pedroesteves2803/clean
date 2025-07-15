<?php
namespace App\Interfaces;

use App\Entities\User;

interface UserGatewayInterface{

    public function createUser(User $user): int;

    public function deleteUser(int $id): void;

}