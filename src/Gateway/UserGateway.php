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

    public function createUser(User $user): User {
        $pdo = $this->connection->getConnection();

        $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindValue(':name', $user->getName());
        $stmt->execute();

        $id = (int) $pdo->lastInsertId();
        $user->setId($id);

        return $user;
    }

    public function deleteUser(int $id): void{
        $pdo = $this->connection->getConnection();

        $stmt = $pdo->prepare(" DELETE FROM users WHERE id = (:id)");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}