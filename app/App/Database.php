<?php

namespace Attar\App\Rahmatan\Travel\App;

class Database
{
    private static ?\PDO $pdo = null;
    
    public static function getConnection(string $env = "test"): \PDO
    {
        if (self::$pdo === null) {
            require_once __DIR__ ."/../Config/DatabaseConfig.php";
            $config = getDatabaseConfig();
            self::$pdo = new \PDO(
                $config["database"][$env]['url'],
                $config["database"][$env]['username'],
                $config["database"][$env]['password']
            ); 
            return self::$pdo;
        }
        return self::$pdo;
    }
}