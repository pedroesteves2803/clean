<?php

use App\External\Database;

require_once '../src/Models/Database.php';

$db = Database::connect();
$stmt = $db->query("SHOW TABLES");

echo "<pre>";
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
