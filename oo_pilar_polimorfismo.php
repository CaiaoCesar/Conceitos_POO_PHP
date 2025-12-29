<?php 
    class Carro extends Veiculo {
        public $tetoSolar = true;

        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        } 

        function abrirTetoSolar() {
            echo "Abrir teto solar";
        }

        function alterarPosicaoVolante() {
            echo "Alterar posição do volante";
        }
    }

    class Moto extends Veiculo{
        public $contraPesoGuidao = true;

         function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        } 
        function empinar() {
            echo "Empinar";
        }

        function trocarMarcha(){
            echo "Desengatar embreagem com a mão e engatar a marcha com o pé.";
        }
    }

    class Veiculo {
        public $placa = null; 
        public $cor = null; 

        function acelerar() {
            echo "Acelerar"; 
        }

        function  freiar(){
            echo "Freiar";
        }

        function trocarMarcha(){
            echo "Desengatar embreagem com o pé e engatar a marcha com a mão.";
        }
    }

    class Caminhao extends Veiculo {
        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        } 
    }

    $carro = new Carro("ABC1234", "Branca");
    $moto = new Moto("XYZ5678", "Preta");
    $caminhao = new Caminhao("DEF567" , "Azul");

    $carro->trocarMarcha(); 
    echo '<br />';
    $moto->trocarMarcha();
    echo '<br />';
    $caminhao->trocarMarcha();
?>

   