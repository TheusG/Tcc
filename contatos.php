<?php 
session_start();


?>


<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato</title>
  <link rel="stylesheet" href="assets/css/contatos.css">
  <link rel="stylesheet" href="style.css">
  <link rel="website icon" type="png" href="image/logoPizzaria1.png">

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

  <?php
  require_once "adm/model/Empresa.class.php";
  $empresa = new Empresa();
  $info = $empresa->infoEmpresa();

  
  ?>

  <!-- Para mudar o estilo do Header e no css principal -->
  <header>
    <a href="index.php">
      <div class="logo">
        <img src="image/<?php for ($i = 0; $i < count($info); $i++) {
          echo $info[$i]["Logo"];
        } ?>" alt="Logo">

        <p><?php for ($i = 0; $i < count($info); $i++) {
              echo $info[$i]["Fantasia"];
            } ?></p>
        <i class="fa-solid fa-pizza-slice"></i>
      </div>
    </a>
    <nav>
      <ul class="nav-links">
        <li class="lioff"> <img src="image/semfoto-removebg-preview.png" alt="" class="imgMenuReduzido"><a href="">Entrar </a></li>
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

            if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] =! 0){
              // echo "<a href=\"perfil.php\">".print_r($_SESSION["CLI-EMAIL"]). "</a>";
              echo "<a href=\"perfil.php\">Perfil</a>";
              echo  "<button class=\"sair\" onclick=\"ExecutaLogout();\">Sair</button>";
            }else{
              echo "<button id=\"abrirLogin\">Login</button>";
            }
          
          
          ?>
    </div>
  </header>
  <!-- Para mudar o estilo do Header e no css principal -->

  <div class="title">
    <h1>Conte-nos como foi a sua experiência com a nossa pizzaria</h1>
    <br><br>
    <h2>Contato</h2>
  </div>
  <div class="contatos">
    <div>
      <h2>Fale com a gente</h2>
      <br>
      <p>Teve algum problema com seu pedido? Liga pra gente que nós resolvemos na hora pra você!
        <br>
        <a href="#">contato@FiveStars.com.br</a>
      </p>
    </div>
    <div>
      <h2>Funcionamento</h2>
      <br>
      <p>Terça a Quinta das 18h às 23h20
        Sexta a Domingo das 18h às 23h40</p>
    </div>
    <div>
      <h2>Siga-nos</h2>
      <br>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-facebook"></i></a>


    </div>
    <div>
      <h2>Quer Entrar no time ?</h2>
      <br>
      <p>Venha fazer parte do time da Five Stars
        <br>
        <a href="#">rh@FiveStars.com.br</a>
      </p>
    </div>

  </div>

  <div class="sessao" id="idForm">
    <div class="formulario">
      <div class="imagem-form">
      <img src="image/<?php for ($i = 0; $i < count($info); $i++) {
          echo $info[$i]["Logo"];
        } ?>" alt="Logo">
        <h2> <i class="fa-solid fa-star"></i> <?php for ($i = 0; $i < count($info); $i++) {
              echo $info[$i]["Fantasia"];
            } ?> <i class="fa-solid fa-star"></i></h2>
        <br>
      </div>
      <form action="">
        <h3>Nome</h3>
        <input type="text" name="" id="Nome" class="campo">
        <br><br>
        <h3>Email</h3>
        <input type="email" name="" id="Email" class="campo">
        <br><br>
        <h3>Telefone</h3>
        <input type="tel" name="" id="Telefone" class="campo">
        <br><br>
        <h3>Mensagem</h3>
        <textarea name="Mensagem" id="Mensagem" cols="30" rows="10" class="campo" style="resize: none;"></textarea>
        <br> <br>
        <input type="submit" id="enviar">


      </form>

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
  <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>
</body>

</html>