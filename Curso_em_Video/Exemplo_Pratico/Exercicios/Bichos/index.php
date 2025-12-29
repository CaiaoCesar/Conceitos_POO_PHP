<?php
    require_once 'Animal.php';
    require_once 'Cachorro.php';

    $Shrek = new Cachorro("Shrek");
    echo $Shrek->falar();

    $papagaio = new Animal("Louro");
    echo "\n" . $papagaio->falar();
?>