<?php
    require "./bibliotecas/lib1/lib1.php";
    require "./bibliotecas/lib2/lib2.php";
    
    use A\Cliente as ClienteA;
    use B\Cliente as ClienteB;

    $clienteA = new ClienteA();
    echo '<pre>';
    print_r($clienteA);
    echo "<br>";
    echo $clienteA->__get('nome');
    echo "<br>";
    echo $clienteA->verNome();
    echo '</pre>';


    $clienteB = new ClienteB();
    echo '<pre>';
    print_r($clienteB);
    echo "<br>";
    echo $clienteB->__get('nome');
    echo "<br>";
    echo $clienteB->verNome();
    echo '</pre>';
?>