<?php
    require_once 'Produto.php';
    require_once 'Carrinho.php';

    $produto1 = new Produto("Notebook", 2500.00);
    $produto2 = new Produto("Mouse", 100.00);

    $carrinho = new Carrinho();
    $carrinho->adicionarProduto($produto1);
    $carrinho->adicionarProduto($produto2);

    $carrinho->listarProdutos();
    $carrinho->calcularTotal();
?>