<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="login.php">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <title>Sua Página</title>
</head>

<body>
  <header>
    <div class="cima">
      <a href="index.html"><img class="foto1" src="images/MegaPet Mart.png" alt=""> </a>
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
        <a href="pedidos.html"><img src="images/dropbox.png" alt=""></a>
        <a href="pedidos.html">Meus Pedidos</a>
      </div>
      <div class="carrinho">
        <a href="carrinho.html">
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
          echo '<a href="logout.php" class="btn btn-dark">Sair</a>';
        } else {
          // Se não estiver logado, mostrar botões de login e cadastro
          echo '<div class="login">';
          echo '<a href="login.html"><button class="entrar_cadastro">';
          echo '<span>Entrar</span>';
          echo '</button></a>';
          echo '<a href="cadastro.html"><button class="entrar_cadastro">';
          echo '<span>Cadastrar</span>';
          echo '</button></a>';
          echo '</div>';
        }
        ?>
      </div>
  </header>
  <div class="navBar">
    <a href="quemsomos.html">Quem Somos</a>
    <a href="produtos.php">Produtos</a>
    <a href="contato.html">Contato</a>
  </div>
  <br>

  <form class="needs-validation1" action="loginProcessa.php" method="post" novalidate>
    <h1>LOGIN</h1>
    <div class="form-row mb-4">
      <div class="col-md-10 mb-3">
        <label for="usuario">Usuário</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="arroba">@</span>
          </div>
          <input type="text" class="form-control" name="loginUsuario" id="usuario" placeholder="Usuário"
            aria-describedby="inputGroupPrepend3" pattern="[A-Za-z]+" required>
          <div class="valid-feedback">
            Tudo certo!
          </div>
          <div class="invalid-feedback">
            Por favor, Preencha o campo.
          </div>
        </div>
      </div>
      <div class="col-md-10 mb-3">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="loginSenha" id="senha" placeholder="Senha" required>
        <div class="valid-feedback">
          Tudo certo!
        </div>
        <div class="invalid-feedback">
          Por favor, Preencha o campo.
        </div>
      </div>

      <div class="col-md-10 mb-3">
    
    <select class="form-select" name="tipo" id="tipo">
      <option value="C">Cliente</option>
      <option value="F">Funcionario</option>
    </select>
  </div>
    </div>
    <button id="btnLogin" class="btn btn-primary" type="submit" onclick="Login()"> Entrar </button>
    <br>
    <a class="textologin" href="cadastro.php">Não possui uma conta? Cadastre-se</a>
    </div>
  </form>


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
</body>

<script src="cadastro.js"></script>
<script src="cep.js"></script>
<script src="mapaLoja.js"></script>

<script>
    <?php if (!empty($_GET['msgErro'])) { ?>
        alert("<?php echo $_GET['msgErro']; ?>");
    <?php } ?>
    <?php if (!empty($_GET['msgSucesso'])) { ?>
        alert("<?php echo $_GET['msgSucesso']; ?>");
    <?php } ?>
</script>


</html>