<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definição da codificação e configuração da viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inclusão do Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Inclusão de estilos personalizados -->
    <link rel="stylesheet" href="cadProduto.css">
    
    <!-- Título da página -->
    <title>Alterar Produto</title>
</head>

<body>

    <!-- Título da seção -->
    <h2>Alterar Produto</h2>

    <?php
    // Inclusão do arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Verificação se o parâmetro 'id' está presente na URL
    if (isset($_GET['id'])) {
        // Atribuição do valor do parâmetro 'id' a uma variável
        $produto_id = $_GET['id'];

        // Consulta SQL para obter os dados do produto com base no 'id'
        $query = "SELECT * FROM produto WHERE id = $produto_id";
        
        // Execução da consulta e obtenção do resultado
        $result = mysqli_query($conn, $query) or die("Impossível executar a query");
        
        // Obtenção de um objeto contendo os dados do produto
        $row = mysqli_fetch_object($result);
    }

    ?>

    <!-- Formulário para alterar dados do produto -->
    <form action="cadprodutosDAO.php" method="post" enctype="multipart/form-data">
        <!-- Campos do formulário preenchidos com os dados do produto -->
        <label>Código do Produto</label><input type="text" name="id" value="<?php echo $row->id; ?>" readonly><br>
        <label>Nome</label><input type="text" name="nome" value="<?php echo $row->nome; ?>"><br>
        <label>Tipo</label><input type="text" name="tipo" value="<?php echo $row->tipo; ?>"><br>
        <label>Categoria</label><input type="text" name="categoria" value="<?php echo $row->categoria; ?>"><br>
        <label>Marca</label><input type="text" name="marca" value="<?php echo $row->marca; ?>"><br>
        <label>Descrição</label><input type="text" name="descricao" value="<?php echo $row->descricao; ?>"><br>
        <label>Valor</label><input type="text" name="valor" value="<?php echo $row->valor; ?>"><br>
        <label>Imagem:</label><input type="file" name="imagem" />
        <label>Quantidade</label><input type="number" name="qtd" value="<?php echo $row->qtd; ?>"><br>

        <!-- Botões para enviar dados e cancelar a operação -->
        <div class="botao">
        <button type="submit" name="enviarDados" class="btn btn-success" value="alt">Salvar</button>
        <a href="cadastroproduto"><button class="btn btn-danger">Cancelar</button></a>
        </div>
    </form>
</body>

</html>
