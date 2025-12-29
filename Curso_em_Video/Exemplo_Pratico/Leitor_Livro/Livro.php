<?php
    require_once "Pessoa.php";
    require_once "Publicacao.php";

    class Livro implements PublicacaoInterface {
        private $titulo; 
        private $autor; 
        private $totPaginas; 
        private $pagAtual; 
        private $aberto; 
        private $leitor; 

        public function getTitulo() {
            return $this->titulo; 
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setAutor($autor) {
            $this->autor = $autor; 
        }

        public function getTotPaginas() {
            return $this->totPaginas;
        }

        public function setTotPaginas($totPaginas) {
            $this->totPaginas = $totPaginas;
        }

        public function getPagAtual() {
            return $this->pagAtual;
        }

        public function setPagAtual($pagAtual) {
            $this->pagAtual = $pagAtual;
        }

        public function getAberto() {
            return $this->aberto;
        }

        public function setAberto($aberto) {
            $this->aberto = $aberto; 
        }

        public function getLeitor() {
            return $this->leitor;
        }

        public function setLeitor($leitor) {
            $this->leitor = $leitor;
        }

        public function abrir() {
            $this->setAberto(true);
            echo "<br>";
            echo "O livro " . $this->getTitulo() . " foi aberto.";
            echo "<br>";
        }

        public function fechar(){
            $this->setAberto(false);
            echo "<br>";
            echo "O livro " . $this->getTitulo() . " foi fechado.";
            echo "<br>";
        }

        public function folhear($p){
            if ($this->getAberto() === true){
               if ($p <= $this->getTotPaginas()) {
                $this->setPagAtual($p);
                echo "<br>";
                echo "Folheando... Página atual: " . $this->getPagAtual();
                echo "<br>";
               }
            }
            else {
                echo "<br>";
                echo "Não é possível folhear um livro fechado.";
                echo "<br>";
            }
        }

        public function avancarPag() {
            if ($this->getaberto() === true){
                $this->setPagAtual($this->getPagAtual() + 1);
                echo "<br>";
                echo "Avançando para a página " . $this->getPagAtual();
                echo "<br>";
            }
            else if ($this->getPagAtual() >= $this->getTotPaginas()) {
                echo "<br>";
                echo "Você já está na última página do livro.";
                echo "<br>";
            }
            else  {
                echo "<br>";
                echo "Não é possível passar página com o livro fechado.";
                echo "<br>";
            }
        }

        public function voltarPag() {
            if ($this->getaberto() === true){
                $this->setPagAtual($this->getPagAtual() - 1);
                echo "<br>";
                echo "Passando para a página " . $this->getPagAtual();
                echo "<br>";
            }
            else if ($this->getPagAtual() < 1) {
                echo "<br>";
                echo "Você já está na primeira página do livro.";
                echo "<br>";
            }
            else  {
                echo "<br>";
                echo "Não é possível passar página com o livro fechado.";
                echo "<br>";
            }
        }


        public function __construct($ttl, $atr, $ttpg, $ltr) {
            $this->setTitulo($ttl);
            $this->setAutor($atr);
            $this->setTotPaginas($ttpg);
            $this->setPagAtual(0);
            $this->setAberto(false);
            $this->setLeitor($ltr);
        }

        public function detalhes() {
            if ($this->getAberto() === true) {
                echo "<br>";
                echo "Livro " . $this->getTitulo() . " escrito por " . $this->getAutor() . "<br>";
                echo "Total de páginas: " . $this->getTotPaginas() . ", página atual: " . $this->getPagAtual() . "<br>";
                echo "Sendo lido por " . $this->getLeitor()->getNome();
                echo "<br>";
            }
            else {
                echo "<br>";
                echo "O livro " . $this->getTitulo() . " está fechado. Abra-o para ver os detalhes.";
                echo "<br>";
            }
        }
    }
?>