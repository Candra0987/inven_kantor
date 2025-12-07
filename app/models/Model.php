<?php

class Model
{
    protected $pdo;

    public function __construct()
    {
        $cfg = require __DIR__ . '/../../config/database.php';

        $dsn = "mysql:host={$cfg['host']};dbname={$cfg['db']};charset={$cfg['charset']}";

        $this->pdo = new PDO(
            $dsn,
            $cfg['user'],
            $cfg['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
