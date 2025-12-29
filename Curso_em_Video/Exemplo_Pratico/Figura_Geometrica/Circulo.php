<?php 
    require_once 'Forma_Geometrica.php';

    class Circulo implements Forma_Geometrica {
        private $raio;
        const PI = 3.14; 

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function calcularArea() {
            $area = self::PI * ($this->raio ** 2);
            echo "A area do círculo  que tem " . $this->__get("raio") . " de raio, tem uma area de: " . $area;
        }

        public function calcularPerimetro() {
            $perimetro = 2 * self::PI * $this->raio;
            echo "O perimetro do círculo  que tem " . $this->__get("raio") . " de raio, tem um perimetro de: " . $perimetro;
        }   
    }

?>