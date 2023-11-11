<?php
session_start();

$timeout = 1440; // tempo sem segundos - 24 minutos

// Verificar se a última atividade da sessão ocorreu há mais tempo que o timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    // Se o timeout foi atingido, destruir a sessão
    session_unset();
    session_destroy();
    echo "0"; // Retornar 0 indica que o tempo expirou
} else {
    // Atualizar o tempo da última atividade
    $_SESSION['last_activity'] = time();
    // Calcular e retornar o tempo restante
    $tempoRestante = $timeout - (time() - $_SESSION['last_activity']);
    echo $tempoRestante;
}
?>
