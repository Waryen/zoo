<?php

class Area {
    private $pk;
    private $name;
    private $animals;
    private $access_behavior;
    
    public function __construct($pk, $name, $animals, $access_behavior) {
        $this->pk = $pk;
        $this->name = $name;
        $this->animals = $animals;
        $this->access_behavior = $access_behavior;
    }
    
    public function access () {
        $this->access_behavior->access();
    }
    
    public function set_access_behavior ($access_behavior) {
        $this->access_behavior = $access_behavior;
    }

    public function get_pk () {
        return $this->pk;
    }
    
    public function get_name () {
        return $this->name;
    }
    
    public function get_animals () {
        return $this->animals;
    }
}

?>