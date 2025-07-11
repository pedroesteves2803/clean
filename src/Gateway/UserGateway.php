<?php
namespace App\Gateway;

use App\Entities\User;
use App\Interfaces\DbConnectionInterface;
use App\Interfaces\UserGatewayInterface;

class UserGateway implements UserGatewayInterface {

    private DbConnectionInterface $connection;

    public function __construct(DbConnectionInterface $dbConnection)
    {
        $this->connection = $dbConnection;
    }

    public function createUser(User $user): void{
        
        $pdo = $this->connection->getConnection();

        $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindValue(':name', $user->getName());
        $stmt->execute();
    }

}