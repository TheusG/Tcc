<?php
session_start();


?>

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
  <link rel="stylesheet" href="assets/css/miniCarrinho.css">

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

<script>
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja tirar esse item do carrinho?");
            if(resp==true){
                location.href = "controller/controller.php?item_delete=1&id=" + id;
            }else{
                return null;
            }
        }
    </script>

 <!-- <style>
#exibirProd{
    position:fixed;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(5px); /* Altere o valor para ajustar a intensidade do desfoque */
    cursor:pointer;
    top: 65px;
    z-index: 999;
  }
  </style>  -->

</head>

<body>
  <div id="exibirProd">
  
    
</div>   
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
    <button id="botaoCarrinho"><i class="fa-solid fa-cart-shopping" id="carrinho"></i></button>
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
        echo "<a href=\"perfil.php\">Convidado</a>";
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
          <form action="controller/controller.php">
            <input type="hidden" name="validaCliente" value="1">
            <h3>Email</h3>
            <input type="email" name="email">
            <br><br>
            <h3>Senha</h3>
            <input type="password" name="senha">
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
          <form action="controller/controller.php" method="post">
            <input type="hidden" name="add_cliente" value="">
            <h3>Email</h3>
            <input type="email" name="email">
            <br><br>
            <h3>Senha</h3>
            <input type="password" name="senha">
            <br><br>
            <h3>Confirmar senha </h3>
            <input type="password" name="confSenha">
            <br><br>
            <div class="divButton">
              <button> Cadastrar </button>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>

  <?php 

    
  require_once "model/Carrinho.class.php";
  $carrinho = new Carrinho();
$infoProduto = $carrinho->mostrarCarrinho();
$total = 0;

?>

  <div class="miniCarrinhoOf">
  <?php 
  if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
    for ($i = 0; $i < count($infoProduto); $i++){
 
      ?>
      <div class="divPedido">
            
            <div class="divImgPedido">
                <img src="imagensProdutos/<?php print_r($infoProduto[$i]["Imagem"]) ?>" alt="imagemProd">
            </div>
        
            <div class="conteinerPedido">
    
              <button id="botaoFecharCarrinho" onclick="confirmDelete(<?=$infoProduto[$i]['Id_Produto'];?>)">X</button>
                <div class="divNomeProduto"><?php
                  print_r($infoProduto[$i]["Nome_Produto"]);
                ?></div>
                <div class="valorPedido">R$<?php
                  print_r($infoProduto[$i]["Valor_Unitario"]);
                ?></div>
                <div class="quantidade">
                <button><i class="fa-solid fa-minus"></i> </button>
                <p><?php
                  print_r($infoProduto[$i]["Quantidade"]);
                ?></p>
                <button><i class="fa-solid fa-plus"></i> </button>
                </div>
              
            </div>
        </div>
        <?php 
         
          $total = $total + $infoProduto[$i]["Valor_Unitario"];
          
          }
        ?>
        
        <div class="divValorTotal">
              <p>R$<?=$total?></p>
          </div>
       <a href="pagamento.php"><button id="botaoConfirmarCompra">Confirmar compra</button></a>
    <?php 
    }else {
    echo "<button id=\"botaoConfirmarCompra\">Faça Login</button>";
  }
  
  ?>
  
   
    


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
          <h3 id="nomeOrigem">
            <?php

            print_r($produto[$i]["Nome_Produto"]);
            ?>
          </h3>
          <?php

          ?>
          <img id="pizzaImage" src="imagensProdutos/<?php print_r($produto[$i]["Imagem"]) ?>" alt="Imagem">


          <p id="prodDesc">
            <?php
            print_r($produto[$i]["Desc_Produto"]);
            ?>
          </p>

          <p id="prodDesc">R$
            <?php
            
            $valor = $produto[$i]["Valor"];
            print_r(number_format($valor, 2, ",", "."));
            ?>
          </p>
          <?php
          echo "<br>";

          

          ?>

          <form method="post" action="controller/controller.php" >
          <input type="hidden" name="addCarrinho" value="">
            <input type="hidden" name="Cod_Produto" value="<?= $produto[$i]["Id_Produto"]; ?>">
            <input type="hidden" name="Usuario" value="<?php 
              if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0){
                echo "1";
              }else{
                echo "0";
              }  ?>">
            <input type="hidden" name="Id_Cliente" value="<?php 
              if (isset($_SESSION["ID-CLIENTE"]) && $_SESSION["ID-CLIENTE"] =! 0){
                echo $_SESSION["ID-CLIENTE"];
              }else{
                echo "0";
              }  ?>">
              <input type="hidden" name="Valor" value="<?= $produto[$i]["Valor"]; ?>">
            <button class="botaodoscrias">Adicionar ao carrinho</button>
          </form>
         


          <!-- <button  class="botaodoscrias">Pedir agora</button> -->
        <?php
          echo "<br>";

          echo "</div>";
        }
        ?>


        <!-- DIv da pizza -->
      </div>
      <!-- Div da categoria -->
    </div>

  </div>
  <!-- Area de ediçao -->









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
    
   <!-- <script>
      
      $('#exibirProd').fadeOut(0);
      function exibirProduto(codigo){
        $('#exibirProd').fadeIn(500);
        $.ajax({
          type: "post",
          url: "confirmarPedido.php?Id_Produto="+codigo,
          success: function (response) {
            $('#exibirProd').html(response);    
          }
        });
      


      }

      exibir = document.querySelector('#exibirProd');
      $('#exibirProd').click(function (e) { 
        e.preventDefault();
        $(this).fadeOut(500);
      });

      
    </script>    -->

    <?php
  if (isset($_REQUEST["msg"])) {
    $cod = $_REQUEST["msg"];
    require_once "view/msg.php";
    echo "<script>alert('" . $MSG[$cod] . "');</script>";
  }

  ?>
  <script src="assets/js/cardapio.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>


</body>



</html>