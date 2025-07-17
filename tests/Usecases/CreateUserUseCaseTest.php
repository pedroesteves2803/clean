<?php

use PHPUnit\Framework\TestCase;
use App\Usecases\CreateUserUseCase;
use App\Dto\NewUserDTO;
use App\Entities\User;
use App\Interfaces\UserGatewayInterface;

class CreateUserUseCaseTest extends TestCase
{
    public function testDeveCriarUsuarioCorretamente()
    {
        $dto = new NewUserDTO('Pedro');

        $userEsperado = new User('Pedro');
        $userEsperado->setId(1);

        $gatewayMock = $this->createMock(UserGatewayInterface::class);

        $gatewayMock->expects($this->once())
            ->method('createUser')
            ->with($this->callback(function (User $user) {
                return $user->getName() === 'Pedro';
            }))
            ->willReturn($userEsperado);

        $usecase = new CreateUserUseCase($gatewayMock);
        $userRetornado = $usecase->execute($dto);

        $this->assertInstanceOf(User::class, $userRetornado);
        $this->assertEquals('Pedro', $userRetornado->getName());
    }
}
