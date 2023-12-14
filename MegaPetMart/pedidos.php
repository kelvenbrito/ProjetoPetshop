<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="pedidos.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="body-no-margin">
<header>
    <div class="cima">
      <a href="index.php"><img class="foto1" src="images/MegaPet Mart.png" alt=""> </a>
      <div id="divBusca">
        <div class="inputBox_container">
          <svg class="search_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" alt="search icon">
            <path
              d="M46.599 46.599a4.498 4.498 0 0 1-6.363 0l-7.941-7.941C29.028 40.749 25.167 42 21 42 9.402 42 0 32.598 0 21S9.402 0 21 0s21 9.402 21 21c0 4.167-1.251 8.028-3.342 11.295l7.941 7.941a4.498 4.498 0 0 1 0 6.363zM21 6C12.717 6 6 12.714 6 21s6.717 15 15 15c8.286 0 15-6.714 15-15S29.286 6 21 6z">
            </path>
          </svg>
          <input class="inputBox" id="inputBox" type="text" placeholder="Pesquise Produtos">
        </div>
      </div>
      <div class="pedidos">
        <a href="pedidos.php"><img src="images/dropbox.png" alt=""></a>
        <a href="pedidos.php">Meus Pedidos</a>
      </div>
      <div class="carrinho">
        <a href="">
          <button data-quantity="0" class="btn-cart">
            <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38"
              xmlns="http://www.w3.org/2000/svg">
              <title>icon-cart</title>
              <path transform="translate(-3.62 -0.85)"
                d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0">
              </path>
            </svg>
            <span class="quantity"></span>
          </button>
        </a>
      </div>
      <div class="login">
        <?php

        session_start();
        // Verificar se $_SESSION['usuario'] está definida
        if (isset($_SESSION['usuario'])) {
          // Mostrar o nome do usuário
          echo '<div class="usuarioLogado">';
          echo 'Bem-vindo, ' . $_SESSION['usuario'];
          echo '</div>';
          echo '<a href="logout.php" class="btn btn-dark" id="logout">Sair</a>';
        } else {
          // Se não estiver logado, mostrar botões de login e cadastro
          echo '<div class="login">';
          echo '<a href="login.php"><button class="entrar_cadastro">';
          echo '<span>Entrar</span>';
          echo '</button></a>';
          echo '<a href="cadastro.php"><button class="entrar_cadastro">';
          echo '<span>Cadastrar</span>';
          echo '</button></a>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </header>
  <div class="navBar">
    <a href="quemsomos.php">Quem Somos</a>
    <a href="produtos.php">Produtos</a>
    <a href="contato.php">Contato</a>
  </div>
  <Section>
    <div class="tituloPedidos">
      <h1>MEUS PEDIDOS</h1>
      <form class=" d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar Pedido" aria-label="Search">
      </form>
    </div>
    <div class="botoesPedidos">
      <button type="submit" class="btn-primary  bg-blue " value="Todos" onclick="Todos()">Todos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Concluidos" onclick="Concluidos()">Concluidos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Abertos" onclick="Abertos()">Abertos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Cancelados" onclick="Cancelados()">Cancelados</button>
    </div>


    <?php
    include 'ConnectionPedido.php';
    ?>



    <div class="Pedido">

      <?php foreach ($pedidos as $pedido): ?>
        <div class="infoPedido">
          <!-- Exibir informações do pedido -->
          <div class='container-fluid'>
            <div class='row'>
              <div class='col-3'>
                <h3 class='texto'>REALIZADO EM <br></h3>
                <br>
                <p>
                  <?php echo $pedido['info']['data']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>TOTAL <br> </h3>
                <br>
                <p>
                  R$
                  <?php echo $pedido['total']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>CEP DESTINO</h3>
                <br>
                <p class="enderecoCSS">
                  <?php echo $pedido['info']['endereco']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>N° PEDIDO <br> </h3>
                <br>
                <p>
                  <?php echo $pedido['info']['numPedido']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="itensPedido">
          <!-- Exibir itens do pedido -->
          <?php foreach ($pedido['itens'] as $item): ?>
            <div class='fundoItens'>
              <div class='imgItem'>
                <img src='images/<?php echo $item['img']; ?>' alt='Imagem do produto'>
              </div>
              <div class='descricao'>
                <h5>
                  <?php echo $item['descricao']; ?>
                </h5>

                <div class='comprNov'>
                  <h6>R$
                    <?php echo $item['valor']; ?>
                  </h6>
                  <button type='submit' class='btn-primary bg-blue' value='Todos' onclick='CompNov()'>COMPRAR
                    NOVAMENTE</button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

    </div>
    </div>
    </div>
  </Section>
  <footer>
    <div class="footer">
      <div class="ladoEsqFooter">
        <img src="images/MegaPet Mart.png" class="logoFooter" alt="">
        <p>(19) 3442-1234 <br>
          vendas@megapetmart.com.br <br>
          Av. Rua das Ruas <br>
          Limeira, São Paulo</p>
      </div>
      <div class="redeSocial">
        <h1>Onde Estamos</h1>
        <a href=""><img class="imgRede" src="images/facebook.png" alt="Facebook"></a>
        <a href=""><img class="imgRede" src="images/instagram.png" alt="Instagram"><br></a>
        <a href=""><img class="imgRede" src="images/whatsapp.png" alt="Whatsapp"></a>
        <a href=""><img class="imgRede" src="images/linkedin.png" alt="LinkedIn"></a>
      </div>
      <div class="politica1">
        <h1>Atendimento</h1>
        <a href="">Central de Atendimento</a><br>
        <a href="">Assessoria de imprensa</a>
      </div>
      <div class="politica2">
        <h1>Políticas</h1>
        <a href="">Aviso de Privacidade</a><br>
        <a href="">Política de Cookies</a><br>
        <a href="">Política de entrega e devolução</a><br>
        <a href="">Política de compra</a><br>
        <a href="">Política de white hat</a>
      </div>
      <div class="politica3">
        <h4>Encontre uma loja</h4>
        <div class="mapa">
          <!-- Elemento onde o mapa será exibido -->
          <div id="mapa"></div>
          <!-- Inclusão da biblioteca Leaflet -->
          <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        </div>
      </div>
    </div>
  </footer>

</body>
<script src="mapaLoja.js"></script>

</html>