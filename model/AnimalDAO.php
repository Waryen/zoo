<?php

//require 'DAO.php';

class AnimalDAO {
    private $table;
    private $connection;
    
    public function __construct() {
        $this->table = "animals";
        $this->connection = new PDO('mysql:host=localhost;dbname=parc', 'root', 'root');
    }
    
    public function fetch_all () {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $animals = array();
            foreach($results as $data) {
                array_push($animals, $this->instanciate($data));
            }
            return $animals;
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    
    public function fetch_by_area ($area_id) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE fk_area = ?");
            $statement->execute([$area_id]);
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $animals = array();
            foreach($results as $data) {
                array_push($animals, $this->instanciate($data));
            }
            return $animals;
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // récupération des animaux pour le formulaire d'ajout

    public function recup_animals($animalName, $race) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE name = ? AND race = ?");
            $statement->execute([$animalName, $race]);
            
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

    // récupération des animaux pour le formulaire de modification

    public function recup_animals_modify($pk) {
        try {
            $statement = $this->connection->prepare("SELECT animals.pk AS animalPk, animals.name AS animalName, animals.race AS animalRace, animals.gender AS animalGender, animals.diet AS animalDiet, areas.pk AS areaPk, areas.name AS areaName
            FROM {$this->table}
            INNER JOIN areas ON animals.fk_area = areas.pk
            WHERE animals.pk = ?");

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

    // ajout d'un animal dans la DB

    public function insert_animal($animalName, $race, $genre, $regime, $zone) {
        try {
            $statement = $this->connection->prepare("INSERT INTO {$this->table} (name, race, gender, diet, fk_area) VALUES (?, ?, ?, ?, ?)");
            $statement->execute([$animalName, $race, $genre, $regime, $zone]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // modification d'un animal dans la DB

    public function modify_animal($pkAnimal, $animalName, $race, $genre, $regime, $zone) {        
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET name = '$animalName', race = '$race', gender = '$genre', diet = '$regime', fk_area = '$zone' WHERE pk = ?");

            $statement->execute([$pkAnimal]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
    }

    // Supprimer un aniaml de la DB

    public function delete_animal ($animal_id) {
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE pk = ?");
            $statement->execute([$animal_id]);
            
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    
    public function instanciate ($data) {
        
        //instancie un animal DEPUIS une ligne de la base de données
        return new Animal(
            $data['pk'],
            $data['name'],
            $data['race'],
            $data['gender'],
            $this->detect_behavior($data['diet'])
        );
    }
    
    public function detect_behavior ($value) {
        
        $behavior = ucfirst($value)."EatBehavior";
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