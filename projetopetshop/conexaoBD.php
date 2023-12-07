<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";


$conn = mysqli_connect($host, $username, $password) or die("Falha ao conectar no banco de dados.");

@mysqli_select_db($conn, $DB) or die("Falha ao acessar o banco de dados.");

?>