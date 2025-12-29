<?php
    require_once 'Animal.php';

    class Cachorro extends Animal {
        public function falar() {
            return "<br /> O cachorro {$this->nome} está latindo Au Au!. <br />";
        }
    }
?>