<?php 
    class Calculadora {
        public static function soma($a, $b) {
            echo "<br />";
            echo "A soma entre " . $a . " e " . $b . " é igual a: " . ($a + $b);
            echo "<br />";
        }

        public static function subtrair($a, $b) {
            echo "<br />";
            echo "A subtração de " . $a . " e " . $b . " é igual a: " . ($a - $b);
            echo "<br />";
        }
        
        public static function multiplicar($a, $b) {
            echo "<br />";
            echo "A multiplicação de " . $a . " e " . $b . " é igual a: " . ($a * $b);
            echo "<br />";
        }

        public static function divisao($a, $b) {
            if ($b === 0){
                echo "<br />";
                echo "Não é possível dividir por ZERO";
                echo "<br />";
            }
            else {
                echo "<br />";
                echo "A divisão entre " . $a . " e " . $b . " é igual a: " . ($a / $b);
                echo "<br />";
            }
        }
    }

    echo Calculadora::soma(2, 6);
    echo Calculadora::subtrair(6, 2);
    echo Calculadora::multiplicar(2, 6);
    echo Calculadora::divisao(6, 2);
?>