<?php
    class Visualizacao {
        private $expectador; 
        private $filme; 

        public function getExpectador() {
            return $this->expectador;
        }

        public function setExpectador($expectador)  {
            $this->expectador = $expectador; 
        }

        public function getFilme() {
            return $this->filme;
        }

        public function setFilme($filme) {
            $this->filme = $filme; 
        }

        public function __construct($expectador, $filme) {
            $this->expectador = $expectador;
            $this->filme = $filme; 
            $this->filme->setViews($this->filme->getViews() + 1);
            $this->expectador->assistirMaisUm();
        }

        public function avaliar(){
            $this->filme->setAvaliacao(5);
            echo "<br>Avaliação padrão de 5 aplicada.<br>";
        }

        public function avaliarNota($nota) {
            $this->filme->setAvaliacao($nota);
            echo "<br>Avaliação de $nota aplicada.<br>";
        }

        public function avaliarPorcentagem($porcentagem) {
            if ($porcentagem <= 20) {
                $this->filme->setAvaliacao(3);
                echo "<br>Avaliação de 3 aplicada.<br>";
            } elseif ($porcentagem <= 50) {
                $this->filme->setAvaliacao(5);
                echo "<br> Avaliação de 5 aplicada.<br>";
            } elseif ($porcentagem <= 90) {
                $this->filme->setAvaliacao(8);
                echo "<br>Avaliação de 8 aplicada.<br>";
            } else {
                $this->filme->setAvaliacao(10);
                echo "<br>Avaliação de 10 aplicada.<br>";
            }
        }

         public function exibir() {
        echo "<hr>";
        echo "Expectador: " . $this->expectador->getNome() . "<br>";
        echo "Vídeo: " . $this->filme->getTitulo() . "<br>";
        echo "Total assistido pelo expectador: " . $this->expectador->getTotAssistido() . "<br>";
        echo "Views do vídeo: " . $this->filme->getViews() . "<br>";
        echo "Avaliação: " . $this->filme->getAvaliacao() . "<br>";
        echo "<hr>";
    }
    }
?>