<?php

use App\Interfaces\DbConnectionInterface;
use App\Usecases\UserUsecase;

class UserController{
    public function create(string $name, DbConnectionInterface $dbConnection){
        
        $

            $usecase = UserUsecase::createUser($name, $dbConnection);
    }
}
