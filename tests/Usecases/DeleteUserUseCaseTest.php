<?php

use PHPUnit\Framework\TestCase;
use App\Usecases\DeleteUserUseCase;
use App\Interfaces\UserGatewayInterface;
use App\Dto\DeleteUSerDTO;

class DeleteUserUseCaseTest extends TestCase
{
    public function testDeveDeletarUsuarioComIdCorreto()
    {
        $idUsuario = 42;
        $dto = new DeleteUSerDTO($idUsuario);

        $gatewayMock = $this->createMock(UserGatewayInterface::class);

        $gatewayMock->expects($this->once())
            ->method('deleteUser')
            ->with($this->equalTo($idUsuario));

        $usecase = new DeleteUserUseCase($gatewayMock);
        $usecase->execute($dto);

    }
}
