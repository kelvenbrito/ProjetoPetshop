<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";


$conn = mysqli_connect($host, $username, $password) or die("Impossível conectar ao banco.");

@mysqli_select_db($conn, $DB) or die("Impossível Conectar");

?>