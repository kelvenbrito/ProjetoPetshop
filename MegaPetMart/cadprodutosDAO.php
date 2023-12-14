<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Inicia a sessão
session_start();

// Verifica se a sessão está vazia (se o usuário não está autenticado)
if (empty($_SESSION)) {
    // Redireciona para a página de cadastro com uma mensagem de erro
    header("Location: cadastro.php?msgErro=Você precisa se autenticar no sistema.");
    die(); // Encerra o script
}

// Recebe os dados do formulário usando o método POST
$id = $_POST["id"];
$nome = $_POST["nome"];
$tipo = $_POST["tipo"];
$categoria = $_POST["categoria"];
$marca = $_POST["marca"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];
$img = $_FILES["imagem"]['name'];
$qtd = $_POST["qtd"];

// Obtém a extensão do arquivo de imagem
$extensao1 = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// Define o diretório para onde a imagem será enviada
$imagem = "imagens/imagensprod/" . time() . "/";
mkdir($imagem, 0777, true); // Cria o diretório se não existir
move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem . "1." . $extensao1); // Move a imagem para o diretório criado

// Verifica qual operação está sendo realizada (cadastro, alteração, exclusão)
if ($_POST['enviarDados'] == 'cad') { // Se for para cadastrar

    // Verifica se as informações foram enviadas pelo formulário e se não estão vazias
    if (
        isset($_POST) && isset($_FILES["imagem"]["name"]) && !empty($_POST) && (!empty($_FILES["imagem"]["name"]))
    ) {
        // Prepara a query SQL para inserir os dados na tabela 'produto'
        $stmt = $conn->prepare("INSERT INTO produto ( prod_img, id, nome, tipo, categoria, marca, descricao, valor, qtd)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Associa os parâmetros da query com os valores recebidos do formulário
        $imagem_completa = $imagem . "1." . $extensao1;
        $stmt->bind_param("sssssssss", $imagem_completa, $id, $nome, $tipo, $categoria, $marca, $descricao, $valor, $qtd);

        // Executa a query preparada
        if ($stmt->execute()) {
            // Redireciona para a página de cadastro com mensagem de sucesso
            header("location:cadastroproduto.php?msgSucesso=Cadastro realizado com sucesso!");
        } else {
            // Redireciona para a página de cadastro com mensagem de erro
            header("Location: cadastroproduto.php?msgErro=Falha ao cadastrar...");
        }
    } else {
        // Redireciona para a página de cadastro com mensagem de erro
        header("Location: cadastroproduto.php?msgErro=Ve");
    }
} elseif ($_POST['enviarDados'] == 'alt') { // Se for para alterar
    // Monta a query SQL para atualizar os dados na tabela 'produto'
    $query = "UPDATE produto SET  prod_img='$imagem/1.$extensao1', nome='$nome', tipo='$tipo', categoria='$categoria', marca='$marca', descricao='$descricao', valor='$valor', qtd='$qtd' WHERE id = $id";

    // Executa a query de atualização
    if (mysqli_query($conn, $query)) {
        // Redireciona para a página de cadastro com mensagem de sucesso
        header("location:cadastroproduto.php?msgSucesso=Dados alterados com sucesso!");
    } else {
        // Redireciona para a página de cadastro com mensagem de erro
        header("location:cadastroproduto.php?msgErro=Erro ao alterar os dados: " . mysqli_error($conn));
    }
} elseif ($_POST['enviarDados'] == 'del') { // Se for para deletar
    // Monta a query SQL para deletar os dados na tabela 'produto'
    $query = "DELETE FROM produto WHERE id = $id ";

    // Executa a query de exclusão
    mysqli_query($conn, $query);

    // Redireciona para a página de cadastro com mensagem de sucesso
    header("location:cadastroproduto.php?msgSucesso=Dados deletados com sucesso!");
} else {
    // Redireciona para a página de cadastro com mensagem de erro (operação não definida)
    header("location:cadastroproduto.php?msgErro=Erro de acesso (Operação não definida).");
}

// Finaliza o script
die();
?>