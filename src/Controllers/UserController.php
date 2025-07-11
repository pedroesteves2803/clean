<?php
namespace App\Controllers;

use App\Gateway\UserGateway;
use App\Interfaces\DbConnectionInterface;
use App\Usecases\UserUsecase;

class UserController{

    private DbConnectionInterface $connection;
    
    public function __construct(DbConnectionInterface $dbConnection)
    {
        $this->connection = $dbConnection;
    }

    public function create(string $name, ){
        
        $gateway = new UserGateway($this->connection);

        UserUsecase::createUser($name, $gateway);
    }
}
