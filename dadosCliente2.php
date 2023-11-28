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
 <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/dadosCliente2.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="website icon" type="png" href="view/img/logo pizzaria1.png">
 



  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script src="assets/js/jquery.mask.js"></script>
  <script src="assets/js/jquery.mask.min.js"></script>


</head>

<body>



<div class="conteinerPagamento">
    <div class="informacoes">
      

      <div class="nome">
        <h3> Identificação</h3>
        <div>
          <div class="campos">
            <h4>Nome</h4>
            <input type="text" name="nome" required value="">
          </div>
          <div class="campos">
            <h4>email</h4>
            <input type="text" name="nome" required value="">
          </div>
          <div class="campos">
            <h4>Telefone</h4>
            <input placeholder="(99)99999-9999" id="telefone" name="telefone" type="tel" required value="">
          </div>
        </div>
      </div>

      <div class="endereco">
        <h3> Endereço</h3>
        <div>
          <div class="campos">
            <h4>CEP</h4>
            <input type="text" value="">
          </div>
          <div class="campos">
            <h4>Cidade</h4>
            <input type="text" value="">
          </div>
          <div class="campos">
            <h4>Bairro</h4>
            <input type="text" value="">
          </div>
        </div>

        <div>
          <div class="campos">
            <h4>Número</h4>
            <input type="text" value="">
          </div>
          <div class="camposRua">
            <h4>Rua</h4>
            <input type="text" value="">
          </div>
          <div class="camposRua">
            <h4>Complemento</h4>
            <input type="text" value="">
          </div>
        </div>
      </div>

      <button class="botaoSalvar">Salvar</button>



    </div>



   


  </div>





 



</body>

</html>