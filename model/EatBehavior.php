<?php

interface EatBehavior {
    public function eat();
}

class CarnivoreEatBehavior implements EatBehavior {
    public function eat() {
        echo "je mange de la viande";
    }
}

class HerbivoreEatBehavior implements EatBehavior {
    public function eat() {
        echo "je mange de l'herbe";
    }
}

class OmnivoreEatBehavior implements EatBehavior {
    public function eat() {
        echo "je mange de tout";
    }
}

?>