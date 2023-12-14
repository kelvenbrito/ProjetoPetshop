<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cadProduto.css">
    <title>Deletar Produto</title>
</head>

<body>

    <h2>Deletar Produto</h2>
    <?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Verifica se o parâmetro 'id' está presente na URL (via GET)
    if (isset($_GET['id'])) {
        // Obtém o ID do produto da URL
        $produto_id = $_GET['id'];

        // Query para selecionar os detalhes do produto com base no ID fornecido
        $query = "SELECT * FROM produto WHERE id = $produto_id";

        // Executa a query para obter os detalhes do produto
        $result = mysqli_query($conn, $query) or die("Impossível executar a query");

        // Obtém os detalhes do produto como um objeto
        $row = mysqli_fetch_object($result);
    }
    ?>

    <form action="cadprodutosDAO.php" method="post" enctype="multipart/form-data">
        <label>Código do Produto</label><input type="text" name="id" value="<?php echo $row->id; ?>" readonly><br>
        <label>Nome</label><input type="text" name="nome" value="<?php echo $row->nome; ?>"><br>
        <label>Tipo </label><input type="text" name="tipo" value="<?php echo $row->tipo; ?>"><br>
        <label>Categoria</label><input type="text" name="categoria" value="<?php echo $row->categoria; ?>"><br>
        <label>Marca</label><input type="text" name="marca" value="<?php echo $row->marca; ?>"><br>
        <label>Descrição</label><input type="text" name="descricao" value="<?php echo $row->descricao; ?>"><br>
        <label>Valor</label><input type="text" name="valor" value="<?php echo $row->valor; ?>"><br>
        <label>Imagem:</label><input type="file" name="imagem" />
        <label>Quantidade</label><input type="number" name="qtd" value="<?php echo $row->qtd; ?>"><br>

        <div class="botao">
        <button type="submit" name="enviarDados" class="btn btn-success" value="del">Excluir</button>
        <a href="cadastroproduto"><button class="btn btn-danger">Cancelar</button></a>
        </div>
    </form>