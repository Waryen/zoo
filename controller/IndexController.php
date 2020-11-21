<?php
require 'model/DAO.php';
require 'model/AreaDAO.php';
require 'model/AnimalDAO.php';
require 'model/EatBehavior.php';
require 'model/AccessBehavior.php';
require 'model/Animal.php';
require 'model/Area.php';

class IndexController {
    
    public function __construct() {
        $this->generate_view();
    }
    
    private function generate_view() {
        
        $animalDAO = new AnimalDAO();
        $areaDAO = new AreaDAO();
        $animals = $animalDAO->fetch_all();
        $areas = $areaDAO->fetch_all();
        $areasAnimals = $areaDAO->recup_areas_for_animals();

        include_once('views/table_layout.php');
        include_once('views/list_layout.php');
        include_once('views/form_animal.php');
        include_once('views/form_area.php');
    }
}

?>