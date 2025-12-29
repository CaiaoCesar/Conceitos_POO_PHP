<?php 
    require_once 'Livro.php';
    require_once 'Biblioteca.php';

    $livro1 = new Livro("1984", "George Orwell", "2025");
    $livro2 = new Livro("To Kill a Mockingbird", "Harper Lee", "2025");

    $biblioteca = new Biblioteca();
    $biblioteca->adicionarLivro($livro1);
    $biblioteca->adicionarLivro($livro2);

    $biblioteca->listarLivros();

    $biblioteca->buscarPorAutor("Harper Lee");
?>