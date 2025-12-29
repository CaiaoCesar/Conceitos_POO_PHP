<?php 
    class Pai{
        private $nome = "Caio"; 
        protected $sobrenome = "César"; 
        public $humor = "Preocupado";

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $value){
            if(strlen($value) >= 3 ){
                $this->$atributo = $value;
            }
        }

        private function executarMania(){
            echo "Assobiar";
        }

        protected function responder(){
            echo "Oi";
        }

        public function executarAcao(){
            $x = rand(1, 10);

            echo "Número gerado: $x <br>";

            if($x >= 1 && $x <= 8){
                $this->responder();
            }
            else{
                $this->executarMania();
            }
        }
    }

    class Filho extends Pai{
        public function __construct(){
            //Exibir os métodos do objeto
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        private function executarMania(){
            echo "Cantar";
        }

        // protected function responder(){
        //     echo "Olá";
        // }

        public function x(){
            $this->executarMania();
        }
    }

    $filho = new Filho();
    echo '<pre>';
    print_r($filho);
    echo '</pre>';

    echo '<pre>';
    $filho->executarAcao();
    echo '<br />';
    $filho->x();
    echo '</pre>';
    
   

    // $pai = new Pai();

    // echo $pai->executarAcao();
?>