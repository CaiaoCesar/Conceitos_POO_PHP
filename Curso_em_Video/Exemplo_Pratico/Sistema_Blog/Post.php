<?php
    class Post{
        private $titulo;
        private $conteudo; 
        private $autor; 
        private $data; 

        public function __construct($t, $c, $a, $d){
            $this->titulo = $t;
            $this->conteudo = $c;
            $this->autor = $a;
            $this->data = $d;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getConteudo() {
            return $this->conteudo;
        }

        public function setConteudo($conteudo) {
            $this->conteudo = $conteudo;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        public function getData() {
            return $this->data;
        }

        public function setData($data) {
            $this->data = $data;
        }
    }
?>