<?php
// Incluindo o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se os dados foram enviados via POST e se não estão vazios
if (isset($_POST) && !empty($_POST)) {
    // Atribuição dos valores dos campos do formulário a variáveis
    $pNome = $_POST["pNome"];
    $sNome = $_POST["sNome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografia da senha
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $nCartao = $_POST["nCartao"];
    $tipo = $_POST["tipo"];

    // Preparação da query para inserir um novo usuário na tabela 'usuarios'
    $stmt = $conn->prepare("INSERT INTO usuarios (pNome, sNome, usuario, email, senha, cidade, estado, cep, cpf, nCartao, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $pNome, $sNome, $usuario, $email, $senha, $cidade, $estado, $cep, $cpf, $nCartao, $tipo);

    // Verifica se o usuário já existe
    if ($_POST["usuario"] == $usuario) {
        header("location:cadastro.php?msgErro=Usuário já cadastrado!");
    }

    // Executa a inserção se o usuário não existe e a execução da query é bem-sucedida
    if ($stmt->execute()) {
        header("location:cadastro.php?msgSucesso=Cadastro realizado com sucesso!");
    } else {
        header("Location: cadastro.php?msgErro=Falha ao cadastrar...");
    }
} else {
    // Redireciona se houver falha ao cadastrar o usuário
    header("Location: cadastro.php?msgErro=Falha ao cadastrar usuário...");
}

// Finaliza a execução do script
die();
?>
