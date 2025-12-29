<?php
    require_once 'Circulo.php';
    require_once 'Quadrado.php'; 

    $circulo = new Circulo();
    $circulo->__set("raio", 12);
    $circulo->calcularArea();
    echo '<br />';
    $circulo->calcularPerimetro();
    echo '<hr />';

    $quadrado = new Quadrado();
    $quadrado->__set("lado", 8);
    $quadrado->calcularArea();
    echo '<br />';
    $quadrado->calcularPerimetro();
    echo '<hr />';
?>