<?php
//modelo

    class Funcionario
    {
        //atributos
        public $nome = null;
        public $idade = null;
        public $telefone = null;
        public $numeroFilhos = null;

        //getters e setters
        function setNome($nome)
        {
            $this->nome = $nome;
        }
        function setIdade($idade)
        {
            $this->idade = $idade;
        }
        function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }
        function setNumeroFilhos($numeroFilhos)
        {
            $this->numeroFilhos = $numeroFilhos;
        }

        //método interno genérico para acessar atributos
        function _get($atributo)
        {
            return $this->$atributo;
        }

        function resumoCadastroFuncionario()
        {
            return $this->_get("nome") . " tem " . $this->_get("idade") . " anos, possui " . $this->_get("numeroFilhos") . " filhos e seu telefone é " . $this->_get("telefone") . ".";
        }
    }

    echo '<hr />';
    //instâncias
    $y = new Funcionario();
    $y->setNome("Caio");
    $y->setIdade(22);
    $y->setTelefone("(38) 88888-8888");
    $y->setNumeroFilhos(0);
    echo $y->resumoCadastroFuncionario();

    echo '<hr />';

    $x = new Funcionario();
    $x->setNome("César");
    $x->setIdade(35);
    $x->setTelefone("(38) 99999-8888");
    $x->setNumeroFilhos(2);
    echo $x->getNome() . " tem " . $x->getIdade() . " anos, possui " . $x->getNumeroFilhos() . " filho(s) e seu telefone é " . $x->getTelefone() . ".";

    echo '<hr />';

?>