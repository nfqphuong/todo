<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;

use Src\System\DatabaseConnector;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$db   = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');
$dbConn = null;

try {
    $dbConn = new \PDO(
        "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
        $user,
        $pass
    );
} catch (\PDOException $e) {
    exit($e->getMessage());
}
