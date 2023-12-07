<?php
require_once 'conexaoBD.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

// session_start();
// if (empty($_SESSION)) {
//     // Significa que as variáveis de SESSAO não foram definidas.
//     // Não poderia acessar aqui.
//     header("Location: cadastro.php?msgErro=Você precisa se autenticar no sistema.");
//     die();
// }

// Verifica se as informaçoes estãp sendo enviada pelo formulário
if (
    isset($_POST) && isset($_FILES["imagem"]["name"]) && !empty($_POST) && (!empty($_FILES["imagem"]["name"])) 
) {



    $id = $_POST["id"]; // Adicionando o endereço do formulário
    $nome = $_POST["nome"]; // Adicionando o nome do formulário 
    $tipo = $_POST["tipo"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];  
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $img = $_FILES["imagem"]['name'];
    $qtd = $_POST["qtd"];

    $extensao1 = strtolower(pathinfo($img, PATHINFO_EXTENSION)); //pega a extensao do arquivo
    $imagem = "imagens/imagensprod/" . time() . "/"; //define o diretorio para onde enviaremos o arquivo
    mkdir($imagem, 0777, true);
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem . "1." . $extensao1);

    if ($_POST['enviarDados'] == 'cad') { // CADASTRAR!!!

        try {


        



            $query = "INSERT INTO produto ( prod_img, id, nome, tipo,categoria, marca, descricao, valor, qtd) VALUES ('$imagem/1.$extensao1', '$id', '$nome', '$tipo','$categoria', '$marca', '$descricao', '$valor',  '$qtd')";

            mysqli_query($conn, $query);


            header("location:cadastroproduto.php?msgSucesso=Cadastro realizado com sucesso!");


        } catch (Exception $e) {
            header("Location: cadastroproduto.php?msgErro=Falha ao cadastrar...");
        }

    } elseif ($_POST['enviarDados'] == 'alt') {


      

        $query = "UPDATE produto SET  prod_img='$imagem/1.$extensao1', nome='$nome', tipo='$tipo', categoria='$categoria', marca='$marca', descricao='$descricao', valor='$valor', qtd='$qtd' WHERE id = $id";





if (mysqli_query($conn, $query)) {
    header("location:cadastroproduto.php?msgSucesso=Dados alterados com sucesso!");
} else {
    header("location:cadastroproduto.php?msgErro=Erro ao alterar os dados: " . mysqli_error($conn));
}

    } elseif ($_POST['enviarDados'] == 'del') {
        $query = "DELETE FROM produto WHERE id = $id ";
        mysqli_query($conn, $query);
    
        header("location:cadastroproduto.php?msgSucesso=Dados deletados com sucesso!");
    } else{
        header("Location: index_logado.php?msgErro=Erro de acesso (Operação não definida).");
    }
    
}else {
    header("Location: cadastroproduto.php?msgErro=Falha ao cadastrar anúncio...");


}
die();
?>