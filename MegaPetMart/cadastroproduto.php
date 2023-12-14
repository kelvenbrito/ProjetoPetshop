
<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['tipo'] != "F") {
// Significa que as variáveis de SESSAO não foram definidas.
// Não poderia acessar aqui.
header("Location: login.php?msgErro=Você não tem permissão para acessar essa conta!");
die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cadProduto.css">
    <title>Document</title>
</head>

<body>

    <h2>Cadastrado de Produtos</h2>
<br>
    <a href="logout.php" class="btn btn-dark" id="logout">Sair</a>
    <div class="container">
        <br>
        <!--  Se houver um parâmetro 'msgErro' na URL, exibe um alerta com seu valor -->
        <?php if (!empty($_GET['msgErro'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>
        <!--  Se houver um parâmetro 'msgSucesso' na URL, exibe um alerta com seu valor -->
        <?php if (!empty($_GET['msgSucesso'])) { ?>

            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } ?>
    </div>
<br>
    <form action="cadprodutosDAO.php" method="post" enctype="multipart/form-data">
        <label>Imagem:</label><input type="file" name="imagem" />
        <label>Código do Produto</label><input type="text" name="id"><br>
        <label>Nome</label><input type="text" name="nome"><br>
        <label>Tipo </label><input type="text" name="tipo"><br>
        <label>Categoria</label><input type="text" name="categoria"><br>
        <label>Marca</label><input type="text" name="marca"><br>
        <label>Descrição</label><input type="text" name="descricao"><br>
        <label>Valor</label><input type="text" name="valor"><br>

        <label>Quantidade</label><input type="number" name="qtd"><br>

        <button type="submit" name="enviarDados" value="cad">Cadastrar</button>
        <button type="button">Apagar </button>

    </form>
    <h2>Lista de produtos cadastrados</h2>

    <?php
    require_once 'db.php';

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filtro = $_POST['filtro'] ?? null;
        $pesquisa = $_POST['pesquisaProd'] ?? '';

        $query = "SELECT * FROM produto";

        // Aplica o filtro
        if (!empty($filtro) && !empty($pesquisa)) {
            $query .= " WHERE $filtro LIKE '%$pesquisa%'";
        }

        $result = mysqli_query($conn, $query) or die("Impossível executar a query");
    } else {
        // Se o formulário não foi submetido, exibe todos os resultados
        $query = "SELECT * FROM produto";
        $result = mysqli_query($conn, $query) or die("Impossível executar a query");
    }
    ?>
 

    <form action="" method="post" enctype="multipart/form-data">

        <!-- Seção dos botões de filtro -->
        <div class="filtroPesquisa">
        <label><input type="radio" name="filtro" value="id"> Código do Produto </label>
        <label><input type="radio" name="filtro" value="nome"> Nome </label>
        <label> <input type="radio" name="filtro" value="tipo"> Tipo </label>
        <label> <input type="radio" name="filtro" value="categoria"> Categoria</label>
        <label><input type="radio" name="filtro" value="descricao"> Descrição</label>
        <label> <input type="radio" name="filtro" value="marca"> Marca</label>
        <label><input type="radio" name="filtro" value="valor"> Valor</label>
        <label><input type="radio" name="filtro" value="qtd"> Quantidade </label>
        </div>
        <input type="text" name="pesquisaProd" placeholder="Pesquisa">
        <button type="submit">Pesquisar</button>
    </form>
    
    <section class="lista-vagas">
        <table class="table" id="tabelaProdutos" class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Código do Produto</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_object($result)) { ?>
                    <tr class="produto-row">
                        <td>
                            <?php
                            // Obtendo o caminho da imagem do banco de dados
                            $caminhoImagem = $row->prod_img;
                            // Exibindo a imagem se existir
                            if ($caminhoImagem && file_exists($caminhoImagem)) {
                                ?>
                                <img src='<?php echo $caminhoImagem; ?>' alt='Imagem do Produto'>
                            <?php } else { ?>
                                <span>Nenhuma imagem disponível</span>
                            <?php } ?>
                        </td>
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
                        <td>
                            <?php echo $row->qtd; ?>
                        </td>



                        <td>

                            <!-- Botões para Alterar e Excluir -->
                            <a href='Alt_prod.php?id=<?php echo $row->id ?>' class='btn btn-warning'>Alterar</a>
                            <a href='Del_prod.php?id=<?php echo $row->id ?>' class='btn btn-danger'>Excluir</a>

                        </td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>





    <div class="rodape">
    </div>

</body>
<script src="script.js"></script>

</html>