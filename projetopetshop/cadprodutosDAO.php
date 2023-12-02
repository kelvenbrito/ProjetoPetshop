<?php
require_once 'factory.php';

// Verifica se a imagem está sendo enviada pelo formulário
if (!empty($_POST) && isset($_FILES["imagem"])) { 

   
    $id = $_POST["id"]; // Adicionando o endereço do formulário
    $nome = $_POST["nome"]; // Adicionando o nome do formulário 
    $tipo = $_POST["tipo"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"]; 
    $valor = $_POST["valor"]; 
    $imagem = $_FILES["imagem"];
    $qtd = $_POST["qtd"];

    try {
        $nomeFinal = time() . '.jpg';
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal);
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

     

         

            $query = "INSERT INTO produto (id, nome, tipo,categoria, marca, descricao, valor, prod_img, qtd) VALUES ('$id', '$nome', '$tipo','$categoria', '$marca', '$descricao', '$valor', '$mysqlImg', '$qtd')";

            mysqli_query($conn, $query) or die("O sistema não foi capaz de executar a query");

            unlink($nomeFinal);

            header("location:cadastroproduto.php?msgSucesso=Cadastro realizado com sucesso!");
          
        }
    } catch (PDOException $e) {
        header("Location: index.php?msgErro=Falha ao cadastrar...");
    }
} else {
    header("Location: cadastroproduto.php?msgErro=Erro de acesso.");
}
die();
?>
