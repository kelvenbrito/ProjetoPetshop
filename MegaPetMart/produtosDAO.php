<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Define a query padrão para buscar os primeiros 12 registros da tabela 'produto'
$query = "SELECT * FROM produto LIMIT 12";

// Verifica se o formulário foi submetido via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica os diferentes casos de filtros que podem ser aplicados
    if (isset($_POST['value-radio'])) {
        // Se o filtro por categoria, tipo ou marca foi aplicado
        $filtro = strtoupper($_POST['value-radio']);
        
        // Query SQL para filtrar por categoria, tipo ou marca
        $query = "SELECT * FROM produto WHERE UPPER(categoria) = '$filtro' OR UPPER(tipo) = '$filtro' OR UPPER(marca) = '$filtro'";
    } elseif (isset($_POST['rangeValor']) && $_POST['rangeValor'] != 0) {
        // Se o filtro por faixa de valores foi aplicado
        $filtrovalor = strtoupper($_POST['rangeValor']);
        
        // Query SQL para filtrar por valor máximo
        $query = "SELECT * FROM produto WHERE valor < '$filtrovalor'";
    } elseif (isset($_POST['radiopg']) && $_POST['radiopg'] > 0) {
        // Se a navegação entre páginas foi acionada
        $pg = strtoupper($_POST['radiopg']);
        
        // Query SQL para exibir a próxima página de resultados
        $query = "SELECT * FROM produto LIMIT 12 OFFSET $pg";
    } else {
        // Se o formulário foi submetido, mas nenhum filtro foi selecionado, exibe todos os resultados
        $query = "SELECT * FROM produto LIMIT 12";
    }
}
?>

