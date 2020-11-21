<?php

//require 'DAO.php';

class AreaDAO {
    private $table;
    private $animalDAO;
    private $connection;

    public function __construct() {
        $this->animalDAO = new AnimalDAO();
        $this->table = "areas";
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
    }
    
    public function fetch_all () {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $areas = array();
            foreach($results as $data) {
                array_push($areas, $this->instanciate($data));
            }
            return $areas;
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // fonction qui récupère les zones pour le formulaire d'ajout d'un animal

    public function recup_areas_for_animals() {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
    // récupération des animaux pour le formulaire de modification

    public function recup_areas_modify($pk) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE pk = ?");
            $statement->execute([$pk]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    // fonction qui récupère les zones pour le formulaire area

    public function recup_areas($name) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE name = ?");
            $statement->execute([$name]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    // fonction qui ajoute une zone

    public function insert_area($areaName, $status) {
        try {
            $statement = $this->connection->prepare("INSERT INTO {$this->table} (name, status) VALUES (?, ?)");
            $statement->execute([$areaName, $status]);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // fonction qui supprime une zone

    public function delete_area ($area_id) {
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE pk = ?");
            $statement->execute([$area_id]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // modification d'une zone dans la DB

    public function modify_area($pkArea, $areaName, $status) {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET name = '$areaName', status = '$status' WHERE pk = ?");
            $statement->execute([$pkArea]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
    }
    
    public function instanciate ($data) {
        
        return new Area(
            $data['pk'],
            $data['name'],
            $this->animalDAO->fetch_by_area($data['pk']),
            $this->detect_behavior($data['status'])
        );
    }
    
    public function detect_behavior ($value) {
        
        $behavior = ucfirst($value)."AccessBehavior";
        return new $behavior();
        /*
        if ($value == "carnivore") {
            return new CarnivoreEatBehavior();
        } else if ($value == "herbivore") {
            return new HerbivoreEatBehavior();
        }
        */
    }
}