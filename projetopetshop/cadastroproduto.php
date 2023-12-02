<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadProduto.css">
    <title>Document</title>
</head>

<body>

    <h2>Cadastrado de Produtos</h2>

    <div class="container">
        <?php if (!empty($_GET['msgErro'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>
        <?php if (!empty($_GET['msgSucesso'])) { ?>

            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } ?>
    </div>

    <form action="cadprodutosDAO.php" method="post" enctype="multipart/form-data">
        <label>Código do Produto</label><input type="text" name="id"><br>
        <label>Nome</label><input type="text" name="nome"><br>
        <label>Tipo </label><input type="text" name="tipo"><br>
        <label>Categorria</label><input type="text" name="tipo"><br>
        <label>Marca</label><input type="text" name="marca"><br>
        <label>Descrição</label><input type="text" name="descricao"><br>
        <label>Valor</label><input type="text" name="valor"><br>
        <label>Imagem:</label><input type="file" name="imagem" />
        <label>Quantidade</label><input type="number" name="qtd"><br>

        <input type="submit" value="Enviar" />
        <button type="button">Atualizar </button>
        <button type="button">Excluir </button>
    </form>
    <h2>Lista de produtos cadastrados</h2>

    <?php
 require_once 'factory.php';


    $query = "SELECT * FROM produto";
    $result = mysqli_query($conn, $query) or die("Impossível executar a query");
    ?>

    <section class="lista-vagas">
        <table class="table">
            <thead>
                <tr>
                    <th>Código do Produto</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Imagem</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_object($result)) { ?>
                    <tr class="produto-row">
                        <td>
                            <?php echo $row->id; ?>
                        </td>
                        <td>
                            <?php echo $row->nome; ?>
                        </td>
                        <td>
                            <?php echo $row->tipo; ?>
                        </td>
                        <td>
                            <?php echo $row->categoria; ?>
                        </td>
                        <td>
                            <?php echo $row->marca; ?>
                        </td>
                        <td>
                            <?php echo $row->descricao; ?>
                        </td>
                        <td>
                            <?php echo $row->valor; ?>
                        </td>
                        <td><img src='data:image/jpeg;base64,<?php echo base64_encode($row->prod_img); ?>'></td>

                        <td>
                            <?php echo $row->qtd; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>





    <div class="rodape">
    </div>

</body>

</html>