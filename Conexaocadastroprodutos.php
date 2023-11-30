<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";

// Verifica se a imagem está sendo enviada pelo formulário
if (isset($_FILES["imagem"])) {
    
   
    $id = $_POST["id"]; // Adicionando o endereço do formulário
    $nome = $_POST["nome"]; // Adicionando o nome do formulário 
    $tipo = $_POST["tipo"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"]; 
    $valor = $_POST["valor"]; 
    $imagem = $_FILES["imagem"];
    $qtd = $_POST["qtd"];

    if ($imagem != NULL) {
        $nomeFinal = time() . '.jpg';
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal);
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

            $conn = mysqli_connect($host, $username, $password) or die("Impossível Conectar");

            @mysqli_select_db($conn, $DB) or die("Impossível Conectar");

            $query = "INSERT INTO produto (id, nome, tipo, marca, descricao, valor, prod_img, qtd) VALUES ('$id', '$nome', '$tipo', '$marca', '$descricao', '$valor', '$mysqlImg', '$qtd')";

            mysqli_query($conn, $query) or die("O sistema não foi capaz de executar a query");

            unlink($nomeFinal);

            header("location:cadastroproduto.php");
        }
    } else {
        echo "Você não realizou o upload de forma satisfatória.";
    }
} else {
   

    $conn = mysqli_connect($host, $username, $password) or die("Impossível conectar ao banco.");

    @mysqli_select_db($conn, $DB) or die("Impossível conectar ao banco.");
    $query = "SELECT * FROM produto WHERE id=$id";
    $result = mysqli_query($conn, $query) or die("Impossível executar a query ");
    $row = mysqli_fetch_object($result);
    Header("Content-type: image/jpg"); 
    echo $row->prod_img;
}
?>
