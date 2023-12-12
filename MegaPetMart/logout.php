<?php
session_start();
if (empty($_SESSION)) {
header("Location: index.html?msgErro=Você precisa se autenticar no sistema.");
}
else {
session_destroy();
header("Location:  login.php?msgSucesso=Logout efetuado com sucesso!");
}
die();
?>