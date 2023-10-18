<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cardápio</title>

  <link rel="stylesheet" href="assets/css/cardapio.css">
  <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="assets/css/carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="website icon" type="png" href="image/logoPizzaria1.png">
  <link rel="stylesheet" href="assets/css/logar.css">
  <link rel="stylesheet" href="assets/css/confirmarProduto.css">

  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script src="assets/js/jquery.mask.js]"></script>
  <script src="assets/js/jquery.mask.min.js"></script>


</head>

<body>
  <?php
  require_once "adm/model/Empresa.class.php";
  $empresa = new Empresa();
  $info = $empresa->infoEmpresa();


  ?>


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
      <button id="abrirLogin">Login</button>
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



 

  <!-- Area de ediçao -->


  <div class="divCardapio">
    <div class="conteinerCardapio">

      <!-- Div da categoria -->
      <?php
      require_once "adm/model/Produto.class.php";
      $prod = new Produto();
      $produto = $prod->exibirProduto();

      ?>

      <div class="conteinerCategoria">

        <?php
        $controle = 999;
        for ($i = 0; $i < count($produto); $i++) {

          if ($controle != $produto[$i]["Categoria"]) {
            $controle = $produto[$i]["Categoria"];
        ?>
            <div class="divCategoria">
              <h2>
                <?php
                print_r($produto[$i]["Nome_Categoria"]);


                ?>

              </h2>
            </div>

            <!-- DIv da pizza -->

          <?php

          }

          echo "<div class=\"conteinerPizza\">";
          echo "<br>";
          ?>
          <h3>
            <?php
            print_r($produto[$i]["Nome_Produto"]);
            ?>
          </h3>
          <?php

          ?>
          <img src="imagensProdutos/<?php print_r($produto[$i]["Imagem"]) ?>" alt="Imagem">


          <p>
            <?php
            print_r($produto[$i]["Desc_Produto"]);
            ?>
          </p>
        <?php
          echo "<br>";
         
          echo "<button class=\"botaodoscrias\">Pedir agora</button>";
        
          echo "<br>";

          echo "</div>";
        }
       
        ?>


        <!-- DIv da pizza -->

        <!-- <div class="conteinerPizza">
          <br>
          <h3>$Nome da Pizza$</h3>
          <img src="image/pizza.jpeg" alt="">
          <p>$Descricao $
            asdasda
            sdasd
            dasda
            sdasda
            sdasdasdasd

          </p>
          <br>
          <button>Pedir Agora</button>
          <br>


        </div>
        <div class="conteinerPizza">
          <br>
          <h3>$Nome da Pizza$</h3>
          <img src="image/pizza.jpeg" alt="">
          <p>$Descricao $
            asdasda
            sdasd
            dasda
            sdasda
            sdasdasdasd

          </p>
          <br>
          <button>Pedir Agora</button>
          <br>


        </div>
        <div class="conteinerPizza">
          <br>
          <h3>$Nome da Pizza$</h3>
          <img src="image/pizza.jpeg" alt="">
          <p>$Descricao $
            asdasda
            sdasd
            dasda
            sdasda
            sdasdasdasd

          </p>
          <br>
          <button>Pedir Agora</button>
          <br>


        </div> -->

      </div>
      <!-- Div da categoria -->
    </div>

  </div>
  <!-- Area de ediçao -->



<!-- tela de confirmar pedido -->




<div id="idConteinerProduto" class="conteinerProdutoOf">
      <input type="button" id="quitButton" value="X">

        <div class="divBackground"><img src="image/toji.jpg" alt=""></div>
        <div class="divImg">
            <img src="image/pizza.jpeg" alt="">
        </div>
        <div class="divNome">
            <h2>$Nome da pizza$</h2>
            <p>$Lorem ipsum dolor sit amet. Et velit sapiente 33 perferendis neque ut aliquid similique a eaque
                sapiente. Et repellendus deserunt ut nihil ipsam a vero dolorem. Qui ipsum iusto et delectus
                perspiciatis et tempore deleniti.</p>
                
        </div>
        <div class="divBotao">
            <p>20,00</p>
            <button>Adicionar ao carrinho</button>
        </div>
    </div>

<!-- tela de confirmar pedido -->


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
    <h2>©2023 Copyright - Desenvolvedora CodeWave</h2>


  </footer>

  <script src="scripts.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>


</body>



</html>