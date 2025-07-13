<?php
namespace App\Usecases;

use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class DeleteUserUseCase{

    private UserGatewayInterface $gateway;

    public function __construct(UserGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(int $id): void
    {
        $this->gateway->deleteUser($id);
    }

}

