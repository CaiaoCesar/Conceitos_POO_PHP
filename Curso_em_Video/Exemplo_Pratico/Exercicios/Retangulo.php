<?php
    class Retangulo {
        private $largura;
        private $altura; 

        public function __construct($largura, $altura) {
            $this->largura = $largura;
            $this->altura = $altura;
        }

        public function calcularArea() {
            return $this->largura * $this->altura;
        }

        public function calcularPerimetro() {
            return 2 * ($this->largura + $this->altura);
        }
    }

    $retangulo1 = new Retangulo(10, 12);
    $retangulo2 = new Retangulo( 5, 3);

    echo "<br />Área do retângulo 1: " . $retangulo1->calcularArea() . "<br />";
    echo "<br />Perímetro do retângulo 1: " . $retangulo1->calcularPerimetro() . "<br />";

    echo "<br />Área do retângulo 2: " . $retangulo2->calcularArea() . "<br />";
    echo "<br />Perímetro do retângulo 2: " . $retangulo2->calcularPerimetro() . "<br />";
?>