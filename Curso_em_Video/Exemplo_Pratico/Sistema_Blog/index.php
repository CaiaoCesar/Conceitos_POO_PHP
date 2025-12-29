<?php
    require_once 'Post.php';
    require_once 'Blog.php';
    
    $post[0] = new Post("Primeiro Post", "Este é o conteúdo do primeiro post.",  "Autor1", "23/12/2025");
    $post[1] = new Post("Segundo Post", "Este é o conteúdo do segundo post.", "Autor2", "24/12/2025");
    $post[2] = new Post("Terceiro Post", "Natal é o conteúdo do terceiro post.", "Autor3", "25/12/2025");

    $blog = new Blog();
    $blog->adicionarPost($post[0]);
    $blog->adicionarPost($post[1]);
    $blog->adicionarPost($post[2]);

    $blog->listarPosts();

    $blog->buscarPorAutor("Autor2");
?>