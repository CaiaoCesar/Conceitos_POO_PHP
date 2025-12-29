<pre>
<?php
    require_once 'Video.php';
    require_once 'Gafanhoto.php';
    require_once 'Visualizacao.php';

    echo "<h2>Sistema de Vídeos</h2>";

    // Criar vídeos
    $v[0] = new Video("Aula 1 de POO");
    $v[1] = new Video("Aula 12 de PHP");
    $v[2] = new Video("Aula 15 de HTML5");

    // Criar gafanhotos
    $g[0] = new Gafanhoto("Jubileu", 22, "M", "juba");
    $g[1] = new Gafanhoto("Creuza", 22, "F", "creuzinha");

    echo "<h3>Antes das visualizações:</h3>";
    echo "Total assistido por Jubileu: " . $g[0]->getTotAssistido() . "<br>";
    echo "Views do vídeo 0: " . $v[0]->getViews() . "<br><br>";

    // Criar visualizações
    $vis[0] = new Visualizacao($g[0], $v[0]);
    echo "<h3>Após visualização 1:</h3>";
    $vis[0]->exibir();

    // Mais visualizações
    $vis[1] = new Visualizacao($g[0], $v[1]);
    $vis[2] = new Visualizacao($g[1], $v[0]);

    echo "<h3>Após mais visualizações:</h3>";
    echo "Total assistido por Jubileu: " . $g[0]->getTotAssistido() . "<br>";
    echo "Total assistido por Creuza: " . $g[1]->getTotAssistido() . "<br>";
    echo "Views do vídeo 0: " . $v[0]->getViews() . "<br>";
    echo "Views do vídeo 1: " . $v[1]->getViews() . "<br><br>";

    // Testar avaliações
    echo "<h3>Avaliações:</h3>";
    $vis[0]->avaliar();
    $vis[0]->avaliarNota(9);
    $vis[0]->avaliarPorcentagem(87.0);

    // Testar controles do vídeo
    echo "<h3>Controles do Vídeo:</h3>";
    $v[0]->play();
    $v[0]->pause();
    $v[0]->like();
?>
</pre>