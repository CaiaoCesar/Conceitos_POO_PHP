<?php 
    require_once 'Forma_Geometrica.php';

    class Quadrado implements Forma_Geometrica{
        private $lado;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor; 
        }  

        public function calcularArea() {
            $area = $this->lado * $this->lado;
            echo "A area do quadrado que tem " . $this->__get("lado") . " de lado, tem uma area de: " . $area;
        }

        public function calcularPerimetro() {
            $perimetro = 4 * $this->__get("lado"); 
            echo "O perimetro do quadrado que tem " . $this->__get("lado") . " de lado, tem um perimetro de: " . $perimetro;
        }
    }
?>