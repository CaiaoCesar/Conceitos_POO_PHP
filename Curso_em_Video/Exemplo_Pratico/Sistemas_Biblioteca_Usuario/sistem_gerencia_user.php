<?php
// Crie uma classe Usuario com:
// - Atributos: id, nome, email, senha (privados)
// - Getters e setters mágicos (__get, __set)
// - Método construtor para inicializar
// - Método para validar email
// - Método para exibir dados de forma segura

    class Usuario {
        private $id;
        private $nome; 
        private $email;
        private $senha; 

        function __get($atributo){
            return $this->$atributo;
        }

        function __set($atributo, $valor){
            $this->$atributo = $valor; 
        }

        private function gerarId(){
            return uniqid("usuario_");
        }

        function __construct($nome, $email, $senha){
            $this->id = $this->gerarId();
            $this->nome = $nome; 
            $this->email = $email; 
            $this->senha = $senha; 

            echo '<pre>';
            echo "Objeto da classe Usuario foi iniciado!<br />";
            print_r( get_class_methods( $this ) ); //print_r($this);
            echo '</pre>';
        }

        function analisaSenha(){
            if(strlen($this->senha) < 6){
                return "Senha fraca!";
            } else {
                return "Senha forte!";
            }
        }

        function analisaEmail($email){
            $emailLimpo = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(filter_var($emailLimpo, FILTER_VALIDATE_EMAIL)){
                return "E-mail válido!";
            } else {
                return "E-mail inválido!";
            }
        }
    }

    $criaUsuario = new Usuario("Caio César", "caiocesardev@gmail.com.br", "devphp");
    echo '<pre>';
    print_r($criaUsuario);
    echo '<br />';
    echo "Análise do e-mail: " . $criaUsuario->analisaEmail($criaUsuario->__get("email")) . "<br />";
    echo "<br />Análise da senha: " . $criaUsuario->analisaSenha() . "<br />";
    
    echo "<hr />";
    echo "<br />Dados do usuário criado: <br />";
    echo '<br />';
    echo "Usuário criado com ID: " . $criaUsuario->__get("id") . "<br />";
    echo "Nome: " . $criaUsuario->__get("nome") . "<br />E-mail: " . $criaUsuario->__get("email") . "<br />Senha: " . $criaUsuario->__get("senha");
    echo "<hr />";
    echo '</pre>';
?>