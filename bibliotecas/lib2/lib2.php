<?php
    namespace B; 
    class Cliente  implements CadastroInterface{
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
?>