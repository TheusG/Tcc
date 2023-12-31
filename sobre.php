<?php
session_start();

?>

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/logar.css">
    <link rel="stylesheet" href="assets/css/sobre.css">
    <link rel="stylesheet" href="style.css">
    <link rel="website icon" type="png" href="image/logoPizzaria1.png">
    <link rel="stylesheet" href="assets/css/miniCarrinho.css">

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

    <title>Sobre</title>
</head>

<body>
    <?php
    require_once "adm/model/Empresa.class.php";
    $empresa = new Empresa();
    $info = $empresa->infoEmpresa();



    ?>

<?php 

    
require_once "model/Carrinho.class.php";
$carrinho = new Carrinho();
$infoProduto = $carrinho->mostrarCarrinho();
$total = 0;
$totalItens = 0;
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
                <li class="lioff"> <img src="image/semfoto-removebg-preview.png" alt="" class="imgMenuReduzido"><a href="">Entrar </a></li>
                <li><a id="home" href="index.php">Home</a></li>
                <li><a id="sobre" href="cardapio.php">Cardápio</a></li>
                <li><a id="sobre" href="sobre.php">Sobre</a></li>
                <li><a id="sobre" href="contatos.php">Contato</a></li>
            </ul>
        </nav>
        <button id="botaoCarrinho"><i class="fa-solid fa-cart-shopping" id="carrinho"></i></button>
        <p><?php for ($i = 0; $i < count($infoProduto); $i++) {
        $totalItens = $totalItens +  $infoProduto[$i]["Quantidade"];
      
        }
      
      echo $totalItens;
      ?></p>
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
  $qtde = new Carrinho();
  $qtdeProduto = $qtde->quantidadeProduto();
  
  ?>

<div class="miniCarrinhoOf">
<?php 
if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
    if($qtdeProduto[0]["total_linhas"] == 0){
        echo "<button id=\"botaoConfirmarCompra\">Carrinho vazio</button>";
      }else{
        for ($i = 0; $i < count($infoProduto); $i++){
   
          ?>
          <div class="divPedido">
                
                <div class="divImgPedido">
                    <img src="imagensProdutos/<?php print_r($infoProduto[$i]["Imagem"]) ?>" alt="imagemProd">
                </div>
            
                <div class="conteinerPedido">

              <button id="botaoFecharCarrinho" onclick="confirmDelete(<?= $infoProduto[$i]['Id_Produto']; ?>)">X</button>
              <div class="divNomeProduto"><?php
                                          print_r($infoProduto[$i]["Nome_Produto"]);
                                          ?></div>
              <div class="valorPedido" id="valorPedido">R$<?php
                                          $valor = $infoProduto[$i]["Valor_Unitario"];
                                          print_r(number_format($valor, 2, ",", "."));
                                          ?></div>
              <div class="quantidade">
                <button id="minus_<?php echo $infoProduto[$i]["Id_Produto"];?>"><i class="fa-solid fa-minus"></i> </button>
                <p id="value_<?php echo $infoProduto[$i]["Id_Produto"];?>"><?php
                    print_r($infoProduto[$i]["Quantidade"]);
                    ?></p>
                <button id="plus_<?php echo $infoProduto[$i]["Id_Produto"];?>"><i class="fa-solid fa-plus"></i> </button>
              </div>

            

              <script>
                 document.addEventListener('DOMContentLoaded', function () {
                    const valueElement_<?php echo $infoProduto[$i]['Id_Produto']; ?> = document.getElementById('value_<?php echo $infoProduto[$i]['Id_Produto']; ?>');
                    const minusButton_<?php echo $infoProduto[$i]['Id_Produto']; ?> = document.getElementById('minus_<?php echo $infoProduto[$i]['Id_Produto']; ?>');
                    const plusButton_<?php echo $infoProduto[$i]['Id_Produto']; ?> = document.getElementById('plus_<?php echo $infoProduto[$i]['Id_Produto']; ?>');
                  
                  let count_<?php echo $infoProduto[$i]['Id_Produto']; ?> = <?php echo $infoProduto[$i]['Quantidade']; ?>;

                  const updateValue_<?php echo $infoProduto[$i]['Id_Produto']; ?> = () =>{
                    valueElement_<?php echo $infoProduto[$i]['Id_Produto']; ?>.innerHTML = count_<?php echo $infoProduto[$i]['Id_Produto']; ?>;
                  };

                  
                  let intervalId = 0

                  plusButton_<?php echo $infoProduto[$i]['Id_Produto']; ?>.addEventListener('click', () =>{
                    if(count_<?php echo $infoProduto[$i]['Id_Produto']; ?> < 99){
                      count_<?php echo $infoProduto[$i]['Id_Produto']; ?> +=1;
                      updateValue_<?php echo $infoProduto[$i]['Id_Produto']; ?>();
                    }
                  });

                  minusButton_<?php echo $infoProduto[$i]['Id_Produto']; ?>.addEventListener('click', () =>{
                    if(count_<?php echo $infoProduto[$i]['Id_Produto']; ?> > 1){
                      count_<?php echo $infoProduto[$i]['Id_Produto']; ?> -= 1;
                      updateValue_<?php echo $infoProduto[$i]['Id_Produto']; ?>();
                    }


                  });


                  document.addEventListener('mouseup' , () => clearInterval(intervalId));
                
                });
              </script>

            </div>
            </div>
            <?php 
             
             $total = $total + $infoProduto[$i]["SubTotal"];
              
              }
            ?>
            
            <div class="divValorTotal" id="valorTotal">
            <p>R$<?php echo number_format($total, 2, ",", ".");?></p>
              </div>
           <a href="pagamento.php"><button id="botaoConfirmarCompra">Confirmar compra</button></a>
        <?php 
      } 
  }else {
  echo "<button id=\"botaoConfirmarCompra\">Faça Login</button>";
}

?>

 
</div>

    <div class="conteinerSobre">
        <div class="ConteinerHistoria">
            <div>
                <h2>Five Stars</h2>
                <br>
                <p>
                    Bem-vindo à Five Stars Pizzaria, onde cada pedaço é uma experiência extraordinária!
                    Com ingredientes frescos e combinações únicas, nossas pizzas são verdadeiramente especiais.Aqui cada detalhe é cuidadosamente planejado para proporcionar uma experiência única.
                    <br>
                    Em nosso cardápio diversificado, você encontrará desde as clássicas favoritas 
                    até combinações exclusivas. Seja um amante da simplicidade da Portuguesa ou um aventureiro 
                    em busca de novos sabores, na Five Stars, temos algo para todos os paladares.
                    <br>

                    Acreditamos que a qualidade é a chave para conquistar o coração de nossos clientes, 
                    e é por isso que escolhemos ingredientes frescos. Na Five Stars cada pizza é uma celebração de 
                    sabores autênticos, criando uma experiência gastronômica que vai além das expectativas.</p>
            </div>
            <div class="divHistoria">
                <h2>História</h2>
                <br>
                <p>Fundada em 2023 por 6 estudantes, a Pizzaria Five Stars tem como objetivo que cada mordida seja uma viagem
                    culinária única e memorável. Nossa pizzaria é muito mais do que apenas um restaurante, é um refúgio
                    gastronômico para todos os amantes de uma boa pizza.
                    <br>
                    Nossa variedade de sabores é verdadeiramente vasta e criativa. Desde as clássicas Mussarela e Calabresa até
                    as inovadoras combinações de sabores como a "Vegetariana", além dos nossos talentosos pizzaiolos, que
                    combinam ingredientes frescos e de alta qualidade para oferecer uma experiência única de sabor em cada
                    fatia. Para completar sua experiência, não deixe de experimentar nossas deliciosas e irresistíveis esfihas.
                </p>
            </div>
        </div>
        <div class="conteinerValores">
            <div class="missao">
                <i class="fa-solid fa-bullseye"></i>
                <br><br>
                <h3>Missão</h3>
                <br>
                <p>Fazer valer a experiência do consumidor, através da qualidade e agilidade
                    de nossos serviços, demonstrando sempre nossos valores e princípios. </p>
            </div>
            <div class="visao">

                <i class="fa-solid fa-binoculars"></i>
                <br><br>
                <h3>Visão</h3>
                <br>
                <p>Pessoas buscam praticidade, é necessário lhe oferecer o serviço mais prático
                    possível, sempre dando lugar a novas ideias.</p>

            </div>
            <div class="valores">
                <i class="fa-solid fa-handshake"></i>
                <br><br>

                <h3>Valores</h3>
                <br>
                <p>Além de valores éticos e morais, nossa empresa visa administrar de forma consciente
                    nosso contato com o público</p>

            </div>
        </div>

    </div>

    <!-- <div class="title">
        <h1>Saiba mais sobre a Pizzaria Five Stars</h1>
        <br><br>
        <h2>Nossa História</i></h2>
    </div>

    <div class="sobre">
        <h3>
            Fundada em 2023 por 6 estudantes, a Pizzaria Five Stars tem como objetivo que cada mordida seja uma viagem
            culinária única e memorável. Nossa pizzaria é muito mais do que apenas um restaurante, é um refúgio
            gastronômico para todos os amantes de uma boa pizza.<br>
            Nossa variedade de sabores é verdadeiramente vasta e criativa. Desde as clássicas Mussarela e Calabresa até
            as inovadoras combinações de sabores como a "Vegetariana", além dos nossos talentosos pizzaiolos, que
            combinam ingredientes frescos e de alta qualidade para oferecer uma experiência única de sabor em cada
            fatia. Para completar sua experiência, não deixe de experimentar nossas deliciosas e irresistíveis esfihas.
        </h3>
    </div> -->

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



    <script src="assets/js/sobre.js"></script>
    <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>



</body>

</html>