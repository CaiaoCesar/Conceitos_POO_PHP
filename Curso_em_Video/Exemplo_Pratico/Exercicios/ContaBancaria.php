<?php
    class ContaBancaria {
        private $titular; 
        private $saldo; 

        public function __construct($titular) {
            $this->titular = $titular; 
            $this->saldo = 0;
        }

        public function depositar($valor) {
            if ($valor > 0) {
                $this->saldo += $valor;
                echo "<br />Depósito de R$ $valor realizado. Novo saldo: R$ " . $this->saldo . "<br />";
            }
            else {
                echo "<br />Valor de depósito inválido.<br />";
            }
        }

        public function sacar($valor) {
            if ($valor > 0 && $valor <= $this->saldo) {
                $this->saldo -= $valor;
                echo "<br />Saque de R$ $valor realizado. Novo saldo: R$ " . $this->saldo . "<br />";
            }
            else {
                echo "<br />Valor de saque inválido ou saldo insuficiente.<br />";
            }
        }

        public function verSaldo() {
            return "<br />Titular: " . $this->titular . " | Saldo: R$ " . $this->saldo . "<br />";
        }
    }

    $conta[1] = new ContaBancaria("Caio");
    $conta[1]->depositar(500);
    $conta[1]->sacar(200);
    echo $conta[1]->verSaldo();

    $conta[2] = new ContaBancaria("Ésdra");
    $conta[2]->depositar(800);
    $conta[2]->sacar(1000);
    echo $conta[2]->verSaldo();
?>