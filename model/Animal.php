<?php

class Animal {
    private $pk;
    private $name;
    private $race;
    private $gender;
    private $eat_behavior;
    
    public function __construct($pk, $name, $race, $gender, $eat_behavior) {
        $this->pk = $pk;
        $this->name = $name;
        $this->race = $race;
        $this->gender = $gender;
        $this->eat_behavior = $eat_behavior;
    }
    
    public function eat () {
        $this->eat_behavior->eat();
    }
    
    public function set_eat_behavior ($eat_behavior) {
        $this->eat_behavior = $eat_behavior;
    }

    public function get_pk () {
        return $this->pk;
    }
    
    public function get_name () {
        return $this->name;
    }
    
    public function get_race () {
        return $this->race;
    }
    
    public function get_gender () {
        return $this->gender;
    }
}


?>




