<?php

interface AccessBehavior {
    public function access();
}

class ClosedAccessBehavior implements AccessBehavior {
    public function access() {
        echo "Acces interdit, zone fermée";
    }
}

class OpenAccessBehavior implements AccessBehavior {
    public function access() {
        echo "Acces ouvert à tous";
    }
}

class WorkAccessBehavior implements AccessBehavior {
    public function access() {
        echo "Acces restreint : travaux";
    }
}

?>