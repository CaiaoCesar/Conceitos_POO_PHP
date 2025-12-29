<?php
    class Livro {
        private $titulo; 
        private $autor; 
        private $anoPublicacao; 

        public function __construct($ttl, $at, $anpb){
            $this->titulo = $ttl; 
            $this->autor = $at; 
            $this->anoPublicacao = $anpb; 
        }

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

        public function getAnoPublicacao() {
            return $this->anoPublicacao;
        }

        public function setAnoPublicacao($anoPublicacao) {
            $this->anoPublicacao = $anoPublicacao;
        }
    }
?>