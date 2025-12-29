<?php
    //modelo
    class Funcionario { 
        //atributos
        public $nome = "Jéferson";
        public $idade = "23";
        public $telefone = "(38) 99999-9999";
        public $numeroFilhos = 2;

        //métodos
        function resumoCadastroFuncionario(){
            return "$this->nome tem $this->idade anos, possui $this->numeroFilhos filhos e seu telefone é $this->telefone.";
        }

        function modificarDados($nome, $idade, $telefone, $numeroFilhos){
           //acesso a atributos da classe
            $this->nome = $nome;
            $this->idade = $idade;
            $this->telefone = $telefone;
            $this->numeroFilhos = $numeroFilhos;
        }
    }

    //instâncias
    $y = new Funcionario();
    echo $y->resumoCadastroFuncionario();
    echo '<br />';
    $y->modificarDados("Caio", 22, "(38) 88888-8888", 0);
    echo $y->resumoCadastroFuncionario();

    echo '<hr />';

    $x = new Funcionario();
    echo $x->resumoCadastroFuncionario();
    echo '<br />';
    $x->modificarDados("César", 35, "(38) 88888-8888", 2);
    echo $x->resumoCadastroFuncionario();
?>