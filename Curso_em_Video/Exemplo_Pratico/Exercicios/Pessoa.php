<?php
    class Pessoa {
        public $nome; 
        public $idade;

        public function __construct($nome, $idade) {
            $this->nome = $nome; 
            $this->idade = $idade; 
        }

        public function apresentar() {
            return "Olá, meu nome é {$this->nome} e tenho {$this->idade} anos.";
        }
    }

    $pessoa1= new Pessoa("Miguel", 10);
    echo $pessoa1->apresentar(); 
?>