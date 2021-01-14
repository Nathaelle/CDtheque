<?php

namespace Models;
use PDO;

class DbConnect {

    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost:3306;dbname=cdtheque;charset=utf8", "root", "");
    }

}