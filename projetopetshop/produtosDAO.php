<?php
            require_once 'conexaoBD.php';
            // Verifica se o formulário foi submetido
            $query = "SELECT * FROM produto LIMIT 2";
       
            if($_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_POST['value-radio'])) {
                    $filtro = strtoupper($_POST['value-radio']);
                    var_dump($filtro);

                    // Query SQL com filtro por categoria
                    $query = "SELECT * FROM produto WHERE UPPER(categoria) = '$filtro' OR UPPER(tipo) = '$filtro' OR UPPER(marca) = '$filtro'";
                } elseif(isset($_POST['rangeValor']) && $_POST['rangeValor'] != 0) {
                    $filtrovalor = strtoupper($_POST['rangeValor']);
                    var_dump($filtrovalor);
                    $query = "SELECT * FROM produto WHERE valor < '$filtrovalor'";
                } elseif(isset($_POST['radiopg']) && $_POST['radiopg'] > 0) {
                    $pg = strtoupper($_POST['radiopg']);
                    $query = "SELECT * FROM produto LIMIT 2 OFFSET $pg";
                    var_dump($query);


                } else {
                    // Caso o formulário tenha sido submetido, mas nenhum filtro tenha sido selecionado, exibe todos os resultados
                    $query = "SELECT * FROM produto LIMIT 2";
                }

               
            }
            ?>
