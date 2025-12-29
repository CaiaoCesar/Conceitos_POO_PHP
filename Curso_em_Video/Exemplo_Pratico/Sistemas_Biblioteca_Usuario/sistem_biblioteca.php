<?php 
// Crie uma hierarquia:
// Interface 'ItemBiblioteca' com métodos: emprestar(), devolver(), getInfo()
// Classe abstrata 'Material' com atributos comuns
// Classes: Livro, Revista, DVD que implementam a interface
// Use polimorfismo para tratar diferentes tipos de forma uniforme

    interface ItemBibliotecaInterface {
        public function emprestar();
        public function devolver();
        public function getInfo();
    }

    abstract class Material implements ItemBibliotecaInterface {
        protected $titulo;
        protected $autor;
        protected $capa;
        protected $disponivel = true; 

        public function __construct($titulo, $autor, $capa)
        {
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->capa = $capa;
        }

        public function emprestar(){
           if ($this->disponivel) {
                $this->disponivel = false;
                return "{$this->getTipo()} '{$this->titulo}' emprestado!";
           }
           return "{$this->getTipo()} '{$this->titulo}' não está disponível pois já está emprestado!";
        }

        public function devolver(){
            $this->disponivel = true;
            return "{$this->getTipo()} '{$this->titulo}' devolvido!";
        }

        public function getStatus(){
            return $this->disponivel ? "Disponível" : "Indisponível";
        }

        abstract public function getTipo();
    }

    class Livro extends Material{
        private $paginas;

        public function __construct($titulo, $autor, $capa, $paginas) {
            parent:: __construct($titulo, $autor, $capa);
            $this->paginas = $paginas;
        }
        public function getInfo() {
        return "LIVRO: {$this->titulo} ({$this->autor}) - {$this->paginas} páginas - Capa: {$this->capa}";
        }
        
        public function getTipo() {
            return "Livro";
        }
    }

    class Revista extends Material {
        private $edicao;
        
        public function __construct($titulo, $autor, $capa, $edicao) {
            parent::__construct($titulo, $autor, $capa);
            $this->edicao = $edicao;
        }
        
        public function getInfo() {
            return "REVISTA: {$this->titulo} - Edição {$this->edicao} - Capa: {$this->capa}";
        }
        
        public function getTipo() {
            return "Revista";
        }
    }

    class DVD extends Material {
        private $duracao;
        
        public function __construct($titulo, $autor, $capa, $duracao) {
            parent::__construct($titulo, $autor, $capa);
            $this->duracao = $duracao;
        }
        
        public function getInfo() {
            return "DVD: {$this->titulo} - {$this->duracao} min - Capa: {$this->capa}";
        }
        
        public function getTipo() {
            return "DVD";
        }
    }

    // USO POLIMÓRFICO
    $itens = [
        new Livro("Web é massa", "Caio", "Capa dura", 300),
        new Revista("Webão", "César", "Capa brochura", 45),
        new DVD("Vivendo um Hello World", "Miguel", "Capa plástica", 120)
    ];

    echo "<h3>Biblioteca - Polimorfismo em Ação</h3>";
    foreach ($itens as $item) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:10px;'>";
        echo "<strong>" . $item->getInfo() . "</strong><br>";
        echo "Status: " . $item->getStatus() . "<br>";
        echo $item->emprestar() . "<br>";
        echo "Status: " . $item->getStatus() . "<br>";
        echo $item->devolver() . "<br>";
        echo "Status: " . $item->getStatus() . "<br>";
        echo "</div>";
    }
?>

