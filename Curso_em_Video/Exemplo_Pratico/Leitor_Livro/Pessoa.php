<?php
    class Pessoa {
        private $nome; 
        private $idade; 
        private $sexo; 

        public function getNome() {
            return $this->nome;
        }
        
        public function setNome($nm){
            $this->nome = $nm; 
        }

        public function getIdade() {
            return $this->idade;
        }

        public function setIdade($idd) {
            $this->idade = $idd;
        }

        public function getSexo() {
            return $this->sexo; 
        }

        public function setSexo($sx) {
            $this->sexo = $sx;
        } 

        public function __construct($nome, $idade, $sexo) {
            $this->setNome($nome);
            $this->setIdade($idade);
            $this->setSexo($sexo);
        }

        public function fazerAniversario() {
            $this->setIdade($this->getIdade() + 1);
            echo "<br>";
            echo "Parabéns! Agora você tem " . $this->getIdade() . " anos";
            echo "<br>";
        }
    }
?>