<?php
    //modelo
    class Funcionario { 
        //atributos
        public $nome = null;
        public $idade = null;
        public $telefone = null;
        public $numeroFilhos = null;
        public $cargo = null; 
        public $salario = null;

        //getters e setters (overloading / sobrecarga)
        function __set ($atributo, $valor){
            $this->$atributo = $valor;       
        }

        function __get ($atributo){
            return $this->$atributo;       
        }
    }

    echo '<hr />';
    //instâncias
    $y = new Funcionario();
    $y->__set("nome", "Caio");
    $y->__set("idade", 22);
    $y->__set("telefone", "(38) 88888-8888"); 
    $y->__set("numeroFilhos", 0);
    echo $y->__get("nome") . " tem " . $y->__get("idade") . " anos, possui " . $y->__get("numeroFilhos") . " filho(s) e seu telefone é " . $y->__get("telefone") . ".";
    echo '<hr />';

    $x = new Funcionario();
    $x->__set("nome", "César");
    $x->__set("idade", 35);
    $x->__set("telefone", "(38) 99999-8888"); 
    $x->__set("numeroFilhos", 2);
    echo $x->__get("nome") . " tem " . $x->__get("idade") . " anos, possui " . $x->__get("numeroFilhos") . " filho(s) e seu telefone é " . $x->__get("telefone") . ".";
    echo '<hr />';
    
?>