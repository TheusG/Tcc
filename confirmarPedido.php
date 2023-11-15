<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/confirmarProduto.css">
</head>

<body>
   
<!-- <button  class="botaodoscrias"id="botaoCardapio">Pedir agora</button>
<button class="botaodoscrias" id="botaoCardapio">Pedir agora</button>
<button  class="botaodoscrias" id="botaoCardapio">Pedir agora</button> -->

<?php 
        if(!isset($_REQUEST["Id_Produto"])){
            ?>  
                <form action="cardapio.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR08">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }

    
      require_once "adm/model/Produto.class.php";
      $prod = new Produto();
      $produto = $prod->mostrarInfo($_REQUEST["Id_Produto"]);
      
      

      ?>
 
    <div id="idConteinerProduto" class="conteinerProdutoOn">
      <input type="button" onclick="javascript:window.location.href='cardapio.php'"  id="quitButton" value="X">
   

        <div class="divBackground"><img src="image/fundoPizza.jpg" alt=""></div>
        <div class="divImg">
            <!-- <img src="ImagensProdutos/Pizza_Toscana.png" alt=""> -->
            <img src="ImagensProdutos/<?php for ($i = 0; $i < count($produto); $i++) {
                    echo $produto[$i]["Imagem"];
                } ?>" alt="Logo">
            
        </div>
        <div class="divNome">
            <h2><?php for ($i = 0; $i < count($produto); $i++) {
                    echo $produto[$i]["Nome_Produto"];
                } ?>
            </h2>

            <p><?php for ($i = 0; $i < count($produto); $i++) {
                    echo $produto[$i]["Desc_Produto"];
                } ?>
            </p>
                
        </div>
        <div class="divBotao">

                <?php for ($i = 0; $i < count($produto); $i++) {
                    $valor =  $produto[$i]["Valor"];
                    echo "<button type=\"submit\">R$" . number_format($valor, 2, ",", ".") . "</button>";
                } ?>

        </div>
    </div>

    <script src="assets/js/indexJs.js"></script>
   
    <script src="jsteste.js"></script>
</body>



</html>