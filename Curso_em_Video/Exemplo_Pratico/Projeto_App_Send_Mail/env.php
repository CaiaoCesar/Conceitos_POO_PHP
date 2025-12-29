<?php
/**
 * Carrega variáveis do arquivo .env
 */
    function loadEnv($path = null) {
        if ($path === null) {
            $path = __DIR__ . '/.env'; // Procura o .env na mesma pasta
        }
        
        if (!file_exists($path)) {
            return false; // Arquivo .env não encontrado
        }
        
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Pula comentários
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Separa chave e valor
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remove aspas se existirem
                $value = trim($value, '"\'');
                
                // Define como variável global
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv("$key=$value");
            }
        }
        
        return true;
    }

    // Carrega automaticamente ao incluir este arquivo
    loadEnv();
?>