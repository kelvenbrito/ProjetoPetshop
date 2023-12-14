<?php
// Definição das credenciais de conexão com o banco de dados
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";

// Conexão com o banco de dados utilizando o MySQLi
$conn = mysqli_connect($host, $username, $password) or die("Impossível conectar ao banco de dados.");
@mysqli_select_db($conn, $DB) or die("Impossível conectar ao banco de dados");

// Consulta SQL para selecionar todos os pedidos na tabela 'pedidos'
$query = "SELECT * FROM pedidos";

// Execução da consulta
$result = mysqli_query($conn, $query) or die("Impossível executar a query");

// Array que armazenará os dados dos pedidos
$pedidos = array();

// Iteração pelos resultados obtidos da consulta
while ($row = mysqli_fetch_assoc($result)) {
    $numPedido = $row['numPedido'];

    // Verifica se o número do pedido já existe no array de pedidos
    if (!array_key_exists($numPedido, $pedidos)) {
        // Se não existe, cria uma entrada para o pedido com informações básicas
        $pedidos[$numPedido] = array(
            'info' => $row, // Informações do pedido
            'itens' => array(), // Array para os itens do pedido
            'total' => 0 // Total inicializado como 0
        );
    }

    // Adiciona o item atual ao array de itens do pedido e atualiza o total
    $pedidos[$numPedido]['itens'][] = $row;
    $pedidos[$numPedido]['total'] += $row['valor'];
}

// Fechamento da conexão com o banco de dados
mysqli_close($conn);
?>
