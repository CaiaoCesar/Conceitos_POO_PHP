<?php 
    date_default_timezone_set('America/Sao_Paulo');

    class MinhaExceptionCustomizada extends Exception {
        private $erro = "";

        public function __construct($erro){
            $this->erro = $erro;
        }

        public function exibirMensagemErroCustomizada(){
            echo '<div style="border: solid 1px #000; padding: 15px; background-color: red; color: white;">';
                echo $this->erro;
            echo '</div>';
        }
    }

    try {
        throw new MinhaExceptionCustomizada("Esse é um erro de teste executado às " . date("H:i:s"));
    } catch (MinhaExceptionCustomizada $e) {
        $e->exibirMensagemErroCustomizada();
    }
?>