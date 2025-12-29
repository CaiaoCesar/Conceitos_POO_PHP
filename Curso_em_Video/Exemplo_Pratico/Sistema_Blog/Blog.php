<?php
    require_once 'Post.php';

    class Blog {
        private $posts = array();

        private $arquivoTxt;

        public function __construct(){
            $this->arquivoTxt = fopen("dados_blog.txt", "w"); 
        
            if ($this->arquivoTxt == false){
                die ("<br />Não foi possível criar o arquivo<br />");
            } 
        }   
        
        public function adicionarPost(Post $post) {
            $this->posts[] = $post;
            echo "<br />Post '" . $post->getTitulo() . "' adicionado ao blog.<br />";

            if ($this->arquivoTxt == true) {
                $fp = fopen("dados_blog.txt", "a");
                fwrite($fp, "Titulo: " . $post->getTitulo() . ", Conteudo: " . $post->getConteudo() . ", Data: " . $post->getData() . ", Autor: " . $post->getAutor() . "<br />\n");
                fclose($fp);
                echo "<br />Dados do post gravados no arquivo dados_blog.txt<br />";
            }
        }

        public function listarPosts() {
            echo "<br />Lista de Posts no Blog:<br />";
            foreach ($this->posts as $post) {
                echo "<br />Titulo: " . $post->getTitulo() . ", Conteúdo: " . $post->getConteudo() . ", Data: " . $post->getData() . ", Autor: " . $post->getAutor() . "<br />";
            }
        }

        public function buscarPorAutor($autor) {
            $resultado = array_filter($this->posts, function($post) use ($autor) {
                return $post->getAutor() === $autor;
            });
            if (empty($resultado)) {
                echo "<br />Nenhum livro encontrado para o autor: " . $autor . "<br />";
            } else {
                echo "<br />Livros encontrados para o autor: " . $autor . "<br />";
                foreach ($resultado as $post) {
                    echo "<br />Titulo: " . $post->getTitulo() . ", Conteúdo: " . $post->getConteudo() . ", Data: " . $post->getData() ."<br />";
                }
            }
        }
    }
?>