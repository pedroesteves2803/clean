<?php
namespace App\External;

use App\Interfaces\DbConnectionInterface;
use PDO;
use PDOException;

class Database implements DbConnectionInterface
{
    private static ?PDO $instance = null;

    public function getConnection(): PDO
    {
        if (!self::$instance) {
            $host = 'db';
            $dbname = 'meubanco';
            $username = 'root';
            $password = 'secret';

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro ao conectar: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}

