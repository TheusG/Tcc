<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>

  <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="assets/css/carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="website icon" type="png" href="image/logoPizzaria1.png">
  <link rel="stylesheet" href="assets/css/logar.css">
  <link rel="stylesheet" href="assets/css/perfil.css">

  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script src="assets/js/jquery.mask.js]"></script>
  <script src="assets/js/jquery.mask.min.js"></script>

  <script>
        function ExecutaLogout() {
            var resp = confirm('Deseja sair?');
            if (resp == true) {
                location.href = "clienteLogout.php";
            } else {
                return null;
            }
        }
    </script>


</head>

<body>

  <header>
    <a href="index.html">
      <div class="logo">
        <img src="image/logoPizzaria1.png" alt="">
        <p>Five Stars</p>
        <i class="fa-solid fa-pizza-slice"></i>
      </div>
    </a>
    <nav>
      <ul class="nav-links">
        <li class="lioff"> <img src="image/semfoto-removebg-preview.png" alt="" class="imgMenuReduzido"><button id="abrirLogin2">Login</button></li>
        <li><a id="home" href="index.php">Home</a></li>
        <li><a id="sobre" href="cardapio.php">Cardápio</a></li>
        <li><a id="sobre" href="sobre.php">Sobre</a></li>
        <li><a id="sobre" href="contatos.php">Contato</a></li>
      </ul>
    </nav>
    <a href=""><i class="fa-solid fa-cart-shopping" id="carrinho"></i></a>
    <div class="burguer">
      <div id="linha1"></div>
      <div id="linha2"></div>
      <div id="linha3"></div>
    </div>
    <div class="login">
      <img src="image/semfoto-removebg-preview.png" class="imgMenuCheio" alt="">
      <?php

      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
        // echo "<a href=\"perfil.php\">".print_r($_SESSION["CLI-EMAIL"]). "</a>";
        echo "<a href=\"perfil.php\">Perfil</a>";
        echo  "<button class=\"sair\" onclick=\"ExecutaLogout();\">Sair</button>";
      } else {
        echo "<button id=\"abrirLogin\">Login</button>";
      }


      ?>
    </div>
  </header>





  <div class="megaConteiner" id="conteinerLogin">
    <button class="exitButton" id="exitButtonn">X</button>
    <div class="conteiner">
      <div class="title">
        <img src="image/logoPizzaria1.png" alt="">
        <h1> <i class="fa-solid fa-star"></i>Five Stars <i class="fa-solid fa-star"></i></h1>
      </div>
      <br><br>

      <div class="conteinerCadastro">
        <div class="logar">

          <h2>Entrar</h2>

          <br>
          <form action="">

            <h3>Email</h3>
            <input type="email">
            <br><br>
            <h3>Senha</h3>
            <input type="password">
            <br><br>
            <div class="divButton">
              <button> Entrar </button>
            </div>
          </form>

        </div>
        <div class="risco">

        </div>
        <div class="cadastrar">

          <h2>Cadastrar</h2>

          <br>
          <form action="">

            <h3>Email</h3>
            <input type="email">
            <br><br>
            <h3>Senha</h3>
            <input type="password">
            <br><br>
            <h3>Confirmar senha</h3>
            <input type="password">
            <br><br>
            <div class="divButton">
              <button> Cadastrar </button>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>

  <div class="divPerfil">
    <div class="conteinerPerfil">
          <div class="menuHorizontal">
        <a href="dadosCliente2.php" target="screen">Pedidos</a>
        <a href="dadosCliente2.php" target="screen">Configurações</a>
        <a href="dadosCliente2.php" target="screen">Ajuda</a>

      </div>
      <div class="conteinerFoto">
        <div class="imagePerfil">
          <img src="image/semfoto-removebg-preview.png" alt="">
        </div>

        <div class="conteinerNome">
          <h2><?php 
          if($_SESSION["CLI-NOME"] == ""){
            print_r($_SESSION["CLI-EMAIL"]);
          }else{
            print_r($_SESSION["CLI-NOME"]);
          }
         
          
          ?></h2>
        </div>
      </div>
      <!-- <div class="menuHorizontal">
        <a href="" target="screen">Pedidos</a>
        <a href="dadosCliente2.php" target="screen">Configurações</a>
        <a href="" target="screen">Ajuda</a>

      </div> -->
      <div class="divFrame">
        <iframe name="screen" id="screen" width="100%" height="100%" src="dadosCliente2.php" style="border: 0px;"></iframe>
      </div>




    </div>

  </div>


















  <footer>
    <div class="rodape">

      <div>

        <h5> Informações</h5>

        <a href="" target="_blank">Politica de privacidade</a>
        <a href="https://theusg.github.io/CodeWave/" target="_blank">Empresa desenvolvedora</a>


      </div>
      <div>
        <h5> Trabalhe conosco</h5>

        <a href="">Parceiras</a>

      </div>

      <div>
        <h5>Conheça mais</h5>

        <a href="">Redes Sociais</a>


      </div>

    </div>
    <h2>©2023 copyright - Desenvolvedora CodeWave</h2>


  </footer>

  <script src="scripts.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>


</body>

</html>

<