<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Iniciar SESSAO (session_start)
    session_start();
    // Obter o usuário fornecido no formulário
    $loginUsuario = $_POST["loginUsuario"];
    $tipoConta = $_POST["tipo"];

    $stmtLogin = $conn->prepare("SELECT senha FROM usuarios WHERE usuario = ? AND tipo = ?");
    $stmtLogin->bind_param("ss", $loginUsuario, $tipoConta);

    $stmtLogin->execute();
    $stmtLogin->bind_result($dbSenha);

    if ($stmtLogin->fetch()) {
        // Usuário encontrado, verificar a senha
        $loginSenha = $_POST["loginSenha"];
        if (password_verify($loginSenha, $dbSenha)) {
            $_SESSION['usuario'] = $loginUsuario; // Definindo variável de sessão
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
            $_SESSION['error'] = "Senha incorreta. Tente novamente.";
            header("location:login.php?msgErro=Senha incorreta. Tente novamente!");
          
          
        }
    } else {

        // Falha na autenticação
        // Destruir a SESSAO
        session_destroy();
        header("location:login.php?msgErro=Usuário não encontrado. Verifique suas credenciais!");
        
    }
    $stmtLogin->close();

} else {

    header("location:login.php?msgErro=Método de requisição inválido!");
   
}
$conn->close();

?>