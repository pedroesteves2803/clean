<?php
namespace App\Usecases;

use App\Dto\DeleteUSerDTO;
use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class DeleteUserUseCase{

    private UserGatewayInterface $gateway;

    public function __construct(UserGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(DeleteUSerDTO $dto): void
    {
        $this->gateway->deleteUser($dto->id);
    }

}

