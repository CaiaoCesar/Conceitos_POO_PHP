<?php
    namespace A; 
    class Cliente implements CadastroInterface {
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
?>
