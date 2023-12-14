<?php
// Inicia a sessão
session_start();

// Verifica se a sessão está vazia (ou seja, se o usuário não está autenticado)
if (empty($_SESSION)) {
    // Redireciona para index.html com uma mensagem de erro
    header("Location: index.html?msgErro=Você precisa se autenticar no sistema.");
} else {
    // Destroi a sessão atual (faz logout)
    session_destroy();
    // Redireciona para login.php com uma mensagem de sucesso
    header("Location: login.php?msgSucesso=Logout efetuado com sucesso!");
}

// Encerra a execução do script
die();
?>
