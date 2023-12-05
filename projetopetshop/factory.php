<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";


$conn = mysqli_connect($host, $username, $password) or die("Falha ao conectar ao banco de dados.");

@mysqli_select_db($conn, $DB) or die("Falha ao conectar ao Database");

?>