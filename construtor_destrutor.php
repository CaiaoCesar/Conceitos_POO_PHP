<?php 
    class Pessoa {
        public $nome = null;

        function __construct($nome){
            echo "Objeto da classe Pessoa foi iniciado!";
            $this->nome = $nome;
        }

        function __destruct() {
            echo "Objeto da classe Pessoa foi removido!";
        }

        function __get($atributo){
            return $this->$atributo;
        }

        function correr() {
            return $this->__get("nome") . " está correndo.";
        }
    }

    $pessoa = new Pessoa("Caio");
    echo "<br />Nome: " . $pessoa->__get('nome');
    echo "<br />" .$pessoa->correr();

    echo "<br />";
    //unset($pessoa); destrói o objeto de forma proposital  
?>