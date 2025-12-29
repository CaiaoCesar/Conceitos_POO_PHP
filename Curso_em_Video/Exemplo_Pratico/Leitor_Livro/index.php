<pre>
<?php
    require_once "Livro.php";
    require_once "Pessoa.php";
     
    $leitor[0] = new Pessoa("Caio", 22, "M");
    $livro[0] = new Livro("PHP Master", "José da Silva", 300, $leitor[0]);

    $leitor[1] = new Pessoa("Ésdra", 25, "F");
    $livro[1] = new Livro("Licenciatura com Amor", "Maria Oliveira", 500, $leitor[1]);

    $leitor[1]->fazerAniversario();

    $livro[0]->abrir();
    $livro[0]->folhear(120);
    $livro[0]->detalhes();
    $livro[0]->avancarPag();
    $livro[0]->voltarPag();
    $livro[0]->fechar();

    $leitor[1]->fazerAniversario();

    $livro[1]->abrir();
    $livro[1]->folhear(120);
    $livro[1]->detalhes();
    $livro[1]->avancarPag();
    $livro[1]->voltarPag();
    $livro[1]->fechar();

    $livro[0]->folhear(120);
    $livro[0]->detalhes();
    $livro[0]->avancarPag();
    $livro[0]->voltarPag();
    
?>
</pre>