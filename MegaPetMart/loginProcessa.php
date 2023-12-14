<?php
// Incluir o arquivo de conexão com o banco de dados
include 'db.php';

// Verificar se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iniciar a sessão
    session_start();

    // Obter o nome de usuário e tipo de conta fornecidos no formulário
    $loginUsuario = $_POST["loginUsuario"];
    $tipoConta = $_POST["tipo"];

    // Preparar a consulta para buscar a senha correspondente ao usuário e tipo de conta
    $stmtLogin = $conn->prepare("SELECT senha FROM usuarios WHERE usuario = ? AND tipo = ?");
    $stmtLogin->bind_param("ss", $loginUsuario, $tipoConta);

    // Executar a consulta e vincular o resultado
    $stmtLogin->execute();
    $stmtLogin->bind_result($dbSenha);

    // Verificar se o usuário foi encontrado no banco de dados
    if ($stmtLogin->fetch()) {
        // Usuário encontrado, verificar a senha
        $loginSenha = $_POST["loginSenha"];
        if (password_verify($loginSenha, $dbSenha)) {
            // Senha correta, definir variáveis de sessão com base no tipo de conta
            $_SESSION['usuario'] = $loginUsuario;
            if ($tipoConta === "C") {
                $_SESSION['tipo'] = $tipoConta;
                header("location:login.php?msgSucesso=Login bem-sucedido!");
            } elseif ($tipoConta === "F") {
                $_SESSION['tipo'] = $tipoConta;
                header("location: cadastroproduto.php?msgSucesso=Login bem-sucedido!");
            } else {
                header("location:login.php?msgErro=Você não tem permissão para acessar essa conta!");
            }
        } else {
            // Senha incorreta, redirecionar com mensagem de erro
            $_SESSION['error'] = "Senha incorreta. Tente novamente.";
            header("location:login.php?msgErro=Senha incorreta. Tente novamente!");
        }
    } else {
        // Usuário não encontrado, destruir a sessão e redirecionar com mensagem de erro
        session_destroy();
        header("location:login.php?msgErro=Usuário não encontrado. Verifique suas credenciais!");
    }
    // Fechar a consulta
    $stmtLogin->close();
} else {
    // Redirecionar se o método de requisição não for POST
    header("location:login.php?msgErro=Método de requisição inválido!");
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
