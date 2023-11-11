<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </title>

  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="website icon" type="png" href="view/img/logo pizzaria1.png">
  <link rel="stylesheet" href="assets/css/dadosCliente.css">



  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script src="assets/js/jquery.mask.js"></script>
  <script src="assets/js/jquery.mask.min.js"></script>


</head>

<body>

  <!-- <div class="dadosCliente">
    <h2>Endereço</h2>
    <br>
    <div class="conteinerDados flex" >
      <div class="padrao flex">
        <div class="TamanhoMid">
          <h3>Cep</h3>
          <input type="text">
        </div>
        <div class="TamanhoMid">
          <h3>Numero</h3>
          <input type="text">
        </div>

      </div>
      <div class="TamanhoMid">
          <h3>Cidade</h3>
          <input type="text">
      </div>
    </div>

  </div> -->






  <div class="conteinerGlobal">

    <div class="dadosCLiente">
      <h2>Endereço</h2>
      <br>

      <div class="conteinerEndereco">
        <div class="padrao">
          <h3>Cep</h3>
          <?php 
            if($_SESSION["CLI-CEP"] == 2){
              echo "<input type=\"text\">";
            }else{
              echo "<input type=\"text\"  value=". $_SESSION["CLI-CEP"] . ">";
            }
          ?>
          
        </div>
        <div class="padrao">
          <h3>Numero</h3>
          <input type="text" name="" id="" value="<?=$_SESSION["CLI-NUMERO"]?>">
        </div>

        <div class="padrao">
          <h3>Cidade</h3>
          <input type="text" name="" id="" value="<?=$_SESSION["CLI-CIDADE"]?>">
        </div>
      </div>



      <div class="conteinerEndereco">
      
        <div class="padrao2">
          <h3>Rua</h3>
          <input type="text" name="" id="" value="<?=$_SESSION["CLI-LOGRADOURO"]?>">
        </div>
        <div class="padrao">
          <h3>bairro</h3>
          <input type="text" name="" id="" value="<?=$_SESSION["CLI-BAIRRO"]?>">
        </div>

     
      </div>

      <div class="conteinerEndereco">
        <div class="padrao2">
          <h3>Complemento</h3>
          <input type="text" name="" id="" value="<?=$_SESSION["CLI-COMPLEMENTO"]?>">
        </div>
        <div class="padrao">
          <h3>logradouro</h3>

          <input type="text" name="" id="" value="<?=$_SESSION["CLI-LOGRADOURO"]?>">
        </div>
        

      </div>

    </div>

  </div>




</body>

</html>