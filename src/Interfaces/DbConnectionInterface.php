<?php
namespace App\Interfaces;

use PDO;

interface DbConnectionInterface {
    public function getConnection(): PDO;
}