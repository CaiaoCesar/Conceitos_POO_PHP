<?php
    namespace A; 
    class Cliente implements \B\CadastroInterface {
        public $nome = "Caio";

        public function __construct(){
            echo "<pre>";
            print_r(get_class_methods($this));
            echo "</pre>";
        }

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function verNome() {
            return "Eu sou o cliente da namespace A";
        }

        public function salvar() {
            echo "Salvo";
        }
        public function remover() {
            echo "Removido";
        }
    }

    interface CadastroInterface {
        public function salvar();
    }

    namespace B; 
    class Cliente  implements \A\CadastroInterface{
        public $nome = "César";

        public function __construct(){
            echo "<pre>";
            print_r(get_class_methods($this));
            echo "</pre>";
        }

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function verNome() {
            return "Eu sou o cliente da namespace B";
        }

        public function remover() {
            echo "Removido";
        }

        public function salvar() {
            echo "Salvo";
        }
    }

     interface CadastroInterface{
        public function remover();
    }

    $classe  = new Cliente();
    print_r($classe);
    echo $classe->__get('nome');
    echo "<br />";
    echo $classe->verNome();

    echo "<hr />";

    $classeA = new \A\Cliente();
    print_r($classeA);
    echo $classeA->__get('nome');
    echo "<br />";
    echo $classeA->verNome();
?>