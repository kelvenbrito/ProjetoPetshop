<?php
include 'db.php';

if (isset($_POST)  && !empty($_POST)) {
    $pNome = $_POST["pNome"];
    $sNome = $_POST["sNome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $nCartao = $_POST["nCartao"];
    $tipo = $_POST["tipo"];

    $stmt = $conn->prepare("INSERT INTO usuarios (pNome, sNome, usuario, email, senha, cidade, estado, cep, cpf, nCartao, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $pNome, $sNome, $usuario, $email, $senha, $cidade, $estado, $cep, $cpf, $nCartao, $tipo);

    if ($stmt->execute()) {
        header("location:cadastro.php?msgSucesso=Cadastro realizado com sucesso!");
    } else {
        header("Location: cadastro.php?msgErro=Falha ao cadastrar...");
    }

} else {
    header("Location: cadastro.php?msgErro=Falha ao cadastrar Usuario...");


}
die();
?>
