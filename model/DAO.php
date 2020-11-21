<?php

class DAO {
    protected $connection;

    protected function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
    }
}




?>