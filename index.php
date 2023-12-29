<?php 
   
 session_start();   
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Five Stars</title>
    
    <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="website icon" type="png" href="image/logoPizzaria1.png">
    <link rel="stylesheet" href="assets/css/logar.css">
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
       <button id="botaoCarrinho"><i class="fa-solid fa-cart-shopping" id="carrinho"></i></button>
        <div class="burguer">
            <div id="linha1"></div>
            <div id="linha2"></div>
            <div id="linha3"></div>
        </div>

        


        <div class="login">
          <img src="image/semfoto-removebg-preview.png" class="imgMenuCheio" alt="">
          
          <?php 

            if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] == 1 ){
              // echo "<a href=\"perfil.php\">".print_r($_SESSION["CLI-EMAIL"]). "</a>";
              echo "<a href=\"perfil.php\">Perfil</a>";
              echo  "<button class=\"sair\" onclick=\"ExecutaLogout();\">Sair</button>";
            }else{
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
                <input type="hidden" name="validaCliente" >
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
                        <button>  Cadastrar </button>
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
              <div class="valorPedido">R$<?php
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
                  
                  let count_<?php echo $infoProduto[$i]['Id_Produto']; ?> = 0;

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
                    if(count_<?php echo $infoProduto[$i]['Id_Produto']; ?> > 0){
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
        
        <div class="divValorTotal">
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

   
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/pizza-recem-assada-na-mesa-de-madeira-rustica-gerada-por-ia.jpg" alt="">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1 style="font-size: 40px;">A Melhor Pizza da Região</h1>
              <p style="font-size: 23px;">Sabor e paixão em cada fatia: Bem-vindo à nossa pizzaria!</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/pizza-gde3511eca_1280.jpg" alt="">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1 style="font-size: 40px;">Variedade de sabores para todos os gostos</h1>
              <p style="font-size: 23px;">Desde os clássicos até criações ousadas</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/pexels-vinicius-benedit-1082343.jpg" alt="">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1 style="font-size: 40px;">A pizzaria que vai surpreender você!</h1>
              <p style="font-size: 23px;">Uma experiência gastronômica 5 estrelas!</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  
    

    <!-- <button id="BotaoBolado">Carrinho</button> -->






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
        
        <script src="assets/js/indexJs.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        
    <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>
    

    <?php
        if (isset($_REQUEST["msg"])) {
            $cod = $_REQUEST["msg"];
            require_once "msg.php";
            echo "<script>alert('" . $MSG[$cod] . "');</script>";
        }

        ?>
</body>
</html>

<!-- 
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="fundos/CARROSSEL 3.gif" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p>.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="fundos/gif2222222222.gif" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5></h5>
          <p>.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="fundos/black-dashboard.gif" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleCaptions'), {
        interval: 5000 // Defina aqui o intervalo de tempo em milissegundos (por exemplo, 5000 para 5 segundos)
      });
    });
  </script> -->