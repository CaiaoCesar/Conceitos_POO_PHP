<?php 
    require_once "ItemMenu.php";
    require_once "Pedido.php";
    require_once "Restaurante.php";

    echo "<h2>Pedidos do Restaurante </h2>";

    // Exemplo de uso
    $restaurante = new Restaurante("Pizzaria do Zé");

    // Adiciona itens ao cardápio
    $pizza = new ItemMenu(1, "Pizza Margherita", 45.90, "Pizzas");
    $refri = new ItemMenu(2, "Refrigerante", 8.50, "Bebidas");
    $restaurante->adicionarItemCardapio($pizza);
    $restaurante->adicionarItemCardapio($refri);

    // Cria pedido 1
    $pedido1 = $restaurante->criarNovoPedido("João Silva");
    $pedido1->adicionarItem($pizza, 2);
    $pedido1->adicionarItem($refri, 3);
    $pedido1->mudarStatus("concluido");
    
    // Cria pedido 2 (para testar melhor)
    $pedido2 = $restaurante->criarNovoPedido("Maria Santos");
    $pedido2->adicionarItem($pizza, 1);
    $pedido2->adicionarItem($refri, 1);
    $pedido2->mudarStatus("preparando");

    echo "<h2>Sistema de Restaurante </h2>";
    
    $restaurante->exibirCardapio();
    echo "<br />";
    $restaurante->exibirDashboard();

    echo "<br /><h3>Detalhes dos Pedidos:</h3>";
    echo "<strong>Pedido 1 (João Silva):</strong> R$ " . number_format($pedido1->calcularTotal(), 2) . "<br />";
    echo "<strong>Pedido 2 (Maria Santos):</strong> R$ " . number_format($pedido2->calcularTotal(), 2) . "<br />";
?>