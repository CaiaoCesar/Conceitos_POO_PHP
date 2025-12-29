<?php
// ============ CLASSE CONTA BANCÁRIA ============
class ContaBanco {
    // Atributos
    private $numConta;
    private $tipo; // CC ou CP
    private $dono;
    private $saldo;
    private $status; // true = aberta, false = fechada
    
    // Construtor
    public function __construct($dono) {
        $this->setDono($dono);
        $this->setStatus(false);
        $this->setSaldo(0);
        echo "<h2>Banco Caio Dev PHP</h2>";
        echo "Olá " . $this->getDono() . ", seja bem vindo ao Banco Caio Dev PHP!<br>";
        echo "Que tal usar nossos serviços bancários?<br>";
        echo "Eles são saque, depósito e pagar mensalidade<br><br>";
        echo "Abra sua Conta e aproveite!<br><br>";
    }
    
    // Métodos Getters e Setters
    public function getNumConta() { return $this->numConta; }
    public function getTipo() { return $this->tipo; }
    public function getDono() { return $this->dono; }
    public function getSaldo() { return $this->saldo; }
    public function getStatus() { return $this->status ? "Ativa" : "Fechada"; }
    
    private function setNumConta($num) { $this->numConta = $num; }
    private function setTipo($tipo) { $this->tipo = $tipo; }
    private function setDono($dono) { $this->dono = $dono; }
    private function setSaldo($saldo) { $this->saldo = $saldo; }
    private function setStatus($status) { $this->status = $status; }

    // Métodos da Conta
    public function abrirConta($tipo) {
        if ($this->status) {
            echo "Conta já está aberta!<br>";
            return;
        }
        
        $this->setStatus(true);
        $this->setTipo($tipo);
        $this->setNumConta(rand(100000, 999999));
        
        if ($tipo == "CC") {
            $this->setSaldo(50);
            $bonus = "R\$50";
        } else {
            $this->setSaldo(150);
            $bonus = "R\$150";
        }
        
        echo "Abrindo conta...<br>";
        echo "Bem vindo {$this->dono} desfrute dos nossos serviços!<br>";
        echo "Seu número da conta é: {$this->numConta}<br>";
        echo "Parabéns por iniciar uma Conta, e de brinde sua Conta {$tipo} está aberta com {$bonus} de saldo inicial de brinde.<br><br>";
    }
    
    public function fecharConta() {
        if (!$this->status) {
            echo "Conta já está fechada!<br>";
            return;
        }
        
        if ($this->saldo > 0) {
            echo "Não pode fechar conta com saldo positivo!<br>";
        } elseif ($this->saldo < 0) {
            echo "Não pode fechar conta em débito!<br>";
        } else {
            $this->setStatus(false);
            $this->setTipo("");
            $this->setSaldo(0);
            echo "Conta de {$this->dono} fechada.<br><br>";
        }
    }
    
    public function depositar($valor) {
        if (!$this->status) {
            echo "Conta fechada, não pode depositar!<br>";
            return;
        }
        
        if ($valor <= 0) {
            echo "Valor de depósito inválido!<br>";
            return;
        }
        
        $this->setSaldo($this->saldo + $valor);
        echo "Depósito de R\$$valor realizado na conta de {$this->dono}<br>";
        echo "Agora está com {$this->saldo}R\$ na conta.<br><br>";
    }
    
    public function sacar($valor) {
        if (!$this->status) {
            echo "Conta fechada, não pode sacar!<br>";
            return;
        }
        
        if ($valor <= 0) {
            echo "Valor de saque inválido!<br>";
            return;
        }
        
        if ($valor > $this->saldo) {
            echo "Saldo insuficiente para saque de R\$$valor!<br>";
            return;
        }
        
        $this->setSaldo($this->saldo - $valor);
        echo "Saque de R\$$valor realizado na conta de {$this->dono}<br>";
        echo "Agora está com {$this->saldo}R\$ na conta.<br><br>";
    }
    
    public function pagarMensalidade() {
        if (!$this->status) {
            echo "Conta fechada!<br>";
            return;
        }
        
        $mensalidade = ($this->tipo == "CC") ? 12 : 50;
        
        if ($this->saldo < $mensalidade) {
            echo "Saldo insuficiente para pagar mensalidade!<br>";
            return;
        }
        
        $this->setSaldo($this->saldo - $mensalidade);
        echo "Pagamento de mensalidade no valor de R\$$mensalidade realizado com sucesso na conta de {$this->dono} que tem a conta do tipo {$this->tipo}.<br>";
        echo "Agora está com {$this->saldo}R\$ na conta.<br><br>";
    }
    
    public function exibirConta() {
        echo "<hr>";
        echo "Conta: {$this->numConta}<br>";
        echo "Tipo: {$this->tipo}<br>";
        echo "Dono: {$this->dono}<br>";
        echo "Saldo: {$this->saldo}<br>";
        echo "Status: " . ($this->status ? "Ativa" : "Fechada") . "<br>";
        echo "<hr><br>";
    }
}

// ============ PROGRAMA PRINCIPAL ============
// Criar conta
$minhaConta = new ContaBanco("Caio César");

// Abrir conta corrente
$minhaConta->abrirConta("CC");

// Operações
$minhaConta->sacar(6);
$minhaConta->depositar(106);

// Exibir dados da conta
$minhaConta->exibirConta();

// Pagar mensalidade
$minhaConta->pagarMensalidade();

// Sacar todo o saldo
$minhaConta->sacar(138);

// Exibir conta novamente
$minhaConta->exibirConta();

// Fechar conta
$minhaConta->fecharConta();
?>