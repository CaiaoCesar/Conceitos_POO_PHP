<?php 

    require_once 'AcoesVideo.php';

    class Video implements AcoesVideoInterface{
        private $titulo;
        private $avaliacao;
        private $views;
        private $curtidas;
        private $reproduzindo;
        
        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getAvaliacao(){
            return $this->avaliacao;
        }

        public function setAvaliacao($avaliacao){
            if ($this -> getViews() > 0) {
                $media = ($this -> getAvaliacao() + $avaliacao) / $this -> getViews();
            } else {
                $media = $avaliacao;
            }
            $this -> avaliacao = $media;
        }   

        public function getViews(){
            return $this->views;
        }
        public function setViews($views){
            $this->views = $views;
        }

        public function getCurtidas(){
            return $this->curtidas;
        }

        public function setCurtidas($curtidas){
            $this->curtidas = $curtidas;
        }

        public function getReproduzindo(){
            return $this->reproduzindo;
        }

        public function setReproduzindo($reproduzindo){
            $this->reproduzindo = $reproduzindo;
        }

        public function play(){
            if ($this->getReproduzindo() === false ) {
                $this->setReproduzindo(true);
                echo "<br>";
                echo "O vídeo " . $this->getTitulo() . " está sendo reproduzido";
                echo "<br>";
            }
            else {
                echo "<br>";
                echo "A ação de reproduzir não pode ser executada pois o vídeo já está sendo reproduzido.";
                echo "<br>";
            }
        }

        public function pause() {
            if ($this->getReproduzindo() === true ) {
                $this->setReproduzindo(false);
                echo "<br>";
                echo "O vídeo " . $this->getTitulo() . " está pausado";
                echo "<br>";
            }
            else {
                echo "<br>";
                echo "A acão de pausar não pode ser executada pois o vídeo já está pausado.";
                echo "<br>";
            }
        }

        public function like() {
            $this->setCurtidas($this->curtidas + 1);
            echo "<br>";
            echo "O vídeo " . $this->getTitulo() . " recebeu um like";
            echo "<br>";
        }

        public function __construct($titulo) {
            $this->setTitulo($titulo);
            $this->setAvaliacao(1);
            $this->setViews(0);
            $this->setCurtidas(0);
            $this->setReproduzindo(false);
        }
    }
?>