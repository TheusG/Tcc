<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="assets/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/sobre.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="logar.css">
    <link rel="website icon" type="png"
    href="view/img/logo pizzaria1.png">
    
    <title>Sobre</title>
</head>
<body>
    <?php 
    include('logar.php');
    ?>

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
            <li class="lioff"> <img src="image/semfoto-removebg-preview.png" alt="" class="imgMenuReduzido"><a href="">Entrar </a></li>
            <li><a id="home" href="index.html">Home</a></li>
            <li><a id="sobre" href="#">Cardápio</a></li>
            <li><a id="sobre" href="contatos.html">Contato</a></li>
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
        <a href="#">Login</a>
        </div>
    </header>
    
    <div class="title">
        <h1>Saiba mais sobre a Pizzaria Five Stars</h1>
        <br><br>
        <h2>Nossa História</i></h2>
    </div>

    <div class="sobre">
        <h3>
            Fundada em 2023 por 6 estudantes, a  Pizzaria Five Stars tem como objetivo que cada mordida seja uma viagem culinária única e memorável. Nossa pizzaria é muito mais do que apenas um restaurante,  é um refúgio gastronômico para todos os amantes de uma boa pizza.<br>
            Nossa variedade de sabores é verdadeiramente vasta e criativa. Desde as clássicas Mussarela e Calabresa até as inovadoras combinações de sabores como a "Brasileira", além dos nossos talentosos pizzaiolos, que combinam ingredientes frescos e de alta qualidade para oferecer uma experiência única de sabor em cada fatia. Para completar sua experiência, não deixe de experimentar nossas deliciosas e irresistíveis esfihas.
        </h3>
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

    <script>
        const menu      = document.querySelector('.nav-links');
        const burguer   = document.querySelector('.burguer');
        const linha1    = document.querySelector('#linha1');
        const linha2    = document.querySelector('#linha2');
        const linha3    = document.querySelector('#linha3');

        burguer.addEventListener('click',()=>{
        menu.classList.toggle('nav-active');
        linha1.classList.toggle('linha1-active')
        linha2.classList.toggle('linha2-active')
        linha3.classList.toggle('linha3-active')
        });
    </script>


    
</body>
</html>