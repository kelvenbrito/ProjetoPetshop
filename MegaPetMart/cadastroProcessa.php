<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se o formulário foi submetido e não está vazio
if (isset($_POST) && !empty($_POST)) {
    // Coleta os dados do formulário
    $pNome = $_POST["pNome"];
    $sNome = $_POST["sNome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografa a senha antes de armazená-la
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $nCartao = $_POST["nCartao"];
    $tipo = $_POST["tipo"];

    // Prepara a query SQL para inserir os dados na tabela 'usuarios'
    $stmt = $conn->prepare("INSERT INTO usuarios (pNome, sNome, usuario, email, senha, cidade, estado, cep, cpf, nCartao, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $pNome, $sNome, $usuario, $email, $senha, $cidade, $estado, $cep, $cpf, $nCartao, $tipo);

    // Executa a query preparada
    if ($stmt->execute()) {
        // Redireciona para a página de cadastro com mensagem de sucesso
        header("location:cadastro.php?msgSucesso=Cadastro realizado com sucesso!");
    } else {
        // Redireciona para a página de cadastro com mensagem de erro em caso de falha
        header("Location: cadastro.php?msgErro=Falha ao cadastrar...");
    }
} else {
    // Redireciona para a página de cadastro com mensagem de falha ao cadastrar usuário
    header("Location: cadastro.php?msgErro=Falha ao cadastrar Usuario...");
}
// Finaliza o script
die();
?>
