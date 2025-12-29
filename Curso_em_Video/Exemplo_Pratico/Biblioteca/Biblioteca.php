<?php
    require_once 'Livro.php';
    
    class Biblioteca {
        private $livros = [];
        
        public function adicionarLivro(Livro $livro) {
            $this->livros[] = $livro;
            echo "<br />";
            echo "Livro '" . $livro->getTitulo() . "' adicionado à biblioteca.\n";
            echo "<br />";
        }

        public function listarLivros() {
            echo "<br />";
            echo "Lista de Livros na Biblioteca: <br /> <br />";
            foreach ($this->livros as $livro) {
                echo "Titulo: " . $livro->getTitulo() . ", Autor: " . $livro->getAutor() . ", Ano de Publicação: " . $livro->getAnoPublicacao() . "\n";
                echo "<br />";
            }
            echo "<br />";
        }

        public function buscarPorAutor($autor) {
            $resultado = array_filter($this->livros, function($livro) use ($autor) {
                return $livro->getAutor() === $autor;
            });
            if (empty($resultado)) {
                echo "Nenhum livro encontrado para o autor: " . $autor . "<br />";
            } else {
                echo "Livros encontrados para o autor: " . $autor . "<br />";
                foreach ($resultado as $livro) {
                    echo "Titulo: " . $livro->getTitulo() . "<br />";
                }
            }
        }
    }
?>