<?php

class DAO {
    private $connection;

    public function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
    }
}




?>