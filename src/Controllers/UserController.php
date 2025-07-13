<?php
namespace App\Controllers;

use App\Interfaces\UserPresenterInterface;
use App\Usecases\CreateUserUseCase;
use App\Usecases\DeleteUserUseCase;

class UserController{

    private CreateUserUseCase $createUserUseCase;
    private DeleteUserUseCase $deleteUserUseCase;
    private UserPresenterInterface $presenter;

    public function __construct(
        CreateUserUseCase $createUserUseCase, 
        DeleteUserUseCase $deleteUserUseCase, 
        UserPresenterInterface $userPresenterInterface
    )
    {
        $this->createUserUseCase = $createUserUseCase;
        $this->deleteUserUseCase = $deleteUserUseCase;
        $this->presenter = $userPresenterInterface;
    }

    public function create(string $name){
        try {
            $user = $this->createUserUseCase->execute($name);
            $this->presenter->present([
                'id' => $user->getId(),
                'name' => $user->getName()
            ]);
        } catch (\Throwable $e) {
            $this->presenter->presentError($e->getMessage());
        }    
    }

    public function delete(int $id){
        try {
            $this->deleteUserUseCase->execute($id);
            $this->presenter->present(['message' => 'Usuário deletado com sucesso.']);
        } catch (\Throwable $e) {
            $this->presenter->presentError($e->getMessage());
        }    
    }
}
