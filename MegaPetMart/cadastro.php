<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="cadastro.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <title>Sua Página</title>
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
        <a href="login.php"><button class="entrar_cadastro">
            <span>Entrar</span>
          </button></a>
        <a href="cadastro.php"><button class="entrar_cadastro">
            <span>Cadastrar</span>
          </button></a>
      </div>
    </div>
  </header>
  <div class="navBar">
    <a href="quemsomos.php">Quem Somos</a>
    <a href="produtos.php">Produtos</a>
    <a href="contato.php">Contato</a>
  </div>
  <br>

  <form class="needs-validation1" novalidate action="cadastroProcessa.php" method="post" onsubmit="enviar()">
        <h1 class="mb-4">CADASTRE-SE</h1>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <label for="pNome">Primeiro nome</label>
                <input type="text" class="form-control" id="pNome" name="pNome" placeholder="Nome" pattern="[A-Za-z]+"
                    required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="sNome">Sobrenome</label>
                <input type="text" class="form-control" id="sNome" name="sNome" placeholder="Sobrenome"
                    pattern="[A-Za-z]+" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="usuario">Usuário</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="arroba">@</span>
                    </div>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário"
                        aria-describedby="inputGroupPrepend3" pattern="[A-Za-z0-9]+" required>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, Preencha o campo.
                    </div>
                </div>
            </div>
        </div>
        <!-- ... Outros campos ... -->
        <div class="row mb-4">
            <div class="col-md-5 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="cEmail">Confirmar E-mail</label>
                <input type="email" class="form-control" id="cEmail" placeholder="E-mail" onblur="Email()" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
        </div>
        <!-- ... Restante dos campos ... -->
        <div class="row mb-4">
            <div class="col-md-5 mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-7 mb-3">
                <label for="cSenha">Confirmar Senha</label>
                <input type="password" class="form-control" id="cSenha" placeholder="Senha" onblur="Senha()" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-5 mb-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" pattern="[A-Za-z]+"
                    required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Sigla" pattern="[A-Z]{2}"
                    required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP (numeros)" pattern="[0-9]{8}"
                    required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF(numeros)" pattern="[0-9]{11}"
                    required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nCartao">Nº Cartão</label>
                <input type="text" class="form-control" id="nCartao" name="nCartao" placeholder="Nº Cartão (numeros)"
                    pattern="[0-9]{13,16}" required>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Por favor, Preencha o campo.
                </div>
            </div>
        </div>
        <div class="cliente">
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label for="tipo">Tipo</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option value="C">Cliente</option>
                    <option value="F">Funcionário</option>
                </select>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" value="" id="termos" onclick="marcarTermos()"
                    required>
                <label class="form-check-label" for="invalidCheck3">
                    Concordo com os termos e condições
                </label>
            </div>
        </div>
        <br>
        <button id="btnCadastro" class="btn btn-primary" type="submit">Cadastre-se</button>
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
<script src="mapaLoja.js"></script>


<script>
    <?php if (!empty($_GET['msgErro'])) { ?>
        // Se houver um parâmetro 'msgErro' na URL, exibe um alerta com seu valor
        alert("<?php echo $_GET['msgErro']; ?>");
    <?php } ?>
    <?php if (!empty($_GET['msgSucesso'])) { ?>
        // Se houver um parâmetro 'msgSucesso' na URL, exibe um alerta com seu valor
        alert("<?php echo $_GET['msgSucesso']; ?>");
    <?php } ?>
</script>

</html>