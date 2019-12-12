<?php
namespace App\database;

use PDO;

class Connection
{
    private static $pdo;

    public static function createConnect(): \PDO
    {
        if (!self::$pdo instanceof PDO){
            $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=avtopark;charset=utf8';
            $user = 'root';
            $pass = '11111111';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            self::$pdo = new \PDO($dsn, $user, $pass, $options);}

        return self::$pdo;
    }
}