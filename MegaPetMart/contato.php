<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="contato.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <title>Quem Somos</title>
</head>

<body>

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

    <div class="total">
        <div class="informacoes">
            <h1>Informações</h1>
            <br>
        </div>
        <div class="tipos">
            <p>Razão Social:</p>
            <p>CNPJ:</p>
            <p>Telefone:</p>
            <p>Whatsapp:</p>
            <p>Endereço:</p>
            <p>CEP:</p>
            <p>Email:</p>
        </div>
        <div class="informacoes2">
            <p>MEGAPET MART LTDA</p>
            <p>26.841.556/0001-02</p>
            <p>(11) 4023-6703</p>
            <p>(11) 94528-4053</p>
            <p>Av. das Nações Unidas 12901 - 11º andar, Brooklin Paulista, São Paulo - SP </p>
            <p>04578-910</p>
            <p>loja@megapetmart.com.br</p>
        </div>
        <br>
        <div class="faleConosco">
            <h1>Fale Conosco</h1>
            <p>Preencha o Formulário abaixo.</p>
        </div>
        <div class="input">
            <input type="text" name="" id="" placeholder="Nome">
            <input type="email" name="" id="" placeholder="E-mail">
            <input type="tel" name="" id="" placeholder="Telefone">
            <input type="text" name="" id="" placeholder="Número do Pedido">
        </div>
        <div class="input2">
            <textarea name="" id="" cols="5" rows="5" placeholder="Digite sua mensagem aqui"></textarea>

            <button id="btnLogin" class="btn btn-success" type="submit" onclick="Enviar()"> Enviar </button>
        </div>
    </div>
    <br><br>
    <!-- inicio do footer  -->
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
    <script src="mapaLoja.js"></script>
</body>

</html>