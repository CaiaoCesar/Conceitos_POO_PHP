<?php 
    interface EquipamentoEletronicoInterface{
        public function ligar();
        public function desligar();
    }

    class Geladeira implements EquipamentoEletronicoInterface {
        public function abrirPorta() {
            echo "Porta da geladeira aberta";
        }

        public function ligar() {
            echo "Geladeira ligada";
        }   

        public function desligar() {
            echo "Geladeira desligada";
        }
    }

    class TV implements EquipamentoEletronicoInterface {
        public function trocarCanal() {
            echo "Canal da TV trocado";
        }

        public function ligar() {
            echo "Televisão ligada";
        }   

        public function desligar() {
            echo "Televisão desligada";
        }
    }

    $minhaGeladeira = new Geladeira();
    echo "<pre>";
    $minhaGeladeira->abrirPorta();
    echo "<br />";
    $minhaGeladeira->ligar();
    echo "<br />";
    $minhaGeladeira->desligar();
    echo "</pre>";

    $minhaTV = new TV();
    echo "<pre>";
    $minhaTV->trocarCanal();
    echo "<br />";
    $minhaTV->ligar();
    echo "<br />";
    $minhaTV->desligar();
    echo "</pre>";

    //---------------------------------------------

    interface MamiferoInterface {
        public function respirar();
    }

    interface TerrestreInterface {
        public function andar();
    }

    interface AquaticoInterface {
        public function nadar();
    }

    class Humano implements MamiferoInterface, TerrestreInterface {
        public function respirar() {
            echo "O humano está respirando";
        }

        public function andar() {
            echo "O humano está andando";
        }

        public function conversar() {
            echo "O humano está conversando";
        }
    }

    class Baleia implements MamiferoInterface, AquaticoInterface{
        public function respirar() {
            echo "A baleia está respirando";
        }

        public function nadar() {
            echo "A baleia está nadando";
        }

        public function esguichar() {
            echo "A baleia está esguichando";
        }
    }

    $meuHumano = new Humano();
    echo "<pre>";
    $meuHumano->respirar();
    echo "<br />";
    $meuHumano->andar();
    echo "<br />";
    $meuHumano->conversar();
    echo "</pre>";

    $minhaBaleia = new Baleia();
    echo "<pre>";
    $minhaBaleia->respirar();
    echo "<br />";
    $minhaBaleia->nadar();
    echo "<br />";
    $minhaBaleia->esguichar();
    echo "</pre>";

    //---------------------------------------------

    interface AnimalInterface {
        public function comer();
    }

    interface AveInterface extends AnimalInterface {
        public function voar();
    }

    class Papagaio implements AveInterface {
        public function voar() {
            echo "O papagaio está voando";
        }

        public function comer() {
            echo "O papagaio está comendo";
        }
    }

    $meuPapagaio = new Papagaio();
    echo "<pre>";
    $meuPapagaio->comer();
    echo "<br />";
    $meuPapagaio->voar();
    echo "</pre>";
?>

