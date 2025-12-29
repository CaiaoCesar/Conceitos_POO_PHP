<?php
    class Animal {
        protected $nome;
        
        public function __construct($nome) {
            $this->nome = $nome;
        }

        public function falar() {
            return "<br /> Animal está fazendo um som. <br />";
        }
    }
?>