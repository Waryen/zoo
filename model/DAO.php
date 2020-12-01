<?php

class DAO {
    protected $connection;
    protected $table;

    protected function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
    }
}




?>