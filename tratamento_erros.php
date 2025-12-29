<?php
// Configurar fuso horário
date_default_timezone_set('America/Sao_Paulo');

try {
    echo '<h3> *** Tratamento de Erros em PHP *** </h3>';
    echo '<p>Horário atual: ' . date("d/m/Y H:i:s") . '</p>';

    $sql = "Select * from usuarios";

    // Simula um Error primeiro
    if (!file_exists("arquivo_inexistente.txt")) {
        throw new Error("Arquivo 'arquivo.txt' não encontrado às " . date("H:i:s"));
    }

    // Esta linha nunca será executada se o Error acima for lançado
    throw new Exception("Erro simulado: Tabela 'usuarios' não existe às " . date("H:i:s"));

} catch (Error $e) {
    echo '<h3> *** Catch capturou o erro do tipo Error *** </h3>';
    echo '<p style="color: red;">' . $e->getMessage() . '</p>';
} catch (Exception $e) {
    echo '<h3> *** Catch capturou o erro do tipo Exception *** </h3>';
    echo '<p style="color: red;">' . $e->getMessage() . '</p>';
} finally {
    echo '<h3> *** Finally sempre executa *** </h3>';
    echo '<p>Finalizado às: ' . date("H:i:s") . '</p>';
}
?>