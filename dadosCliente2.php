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
          <form action="controller/controller.php" method="post" class="formInfo">
            <input type="hidden" name="confirmarDados">
            <input type="hidden" name="Id_Usuario" value="<?=$_SESSION["CLI-ID"]?>">
            <div class="campos">
              <h4>Nome</h4>
              <input type="text" name="nome" required value="<?php
                                                            if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                                              print_r($_SESSION["CLI-NOME"]);
                                                            } else {
                                                              echo "";
                                                            } ?>">
            </div>
            <div class="campos">
              <h4>email</h4>
              <input type="text" name="email" required value="<?php
                                                            if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                                              print_r($_SESSION["CLI-EMAIL"]);
                                                            } else {
                                                              echo "";
                                                            } ?>">
            </div>
            <div class="campos">
              <h4>Telefone</h4>
              <input placeholder="(99)99999-9999" id="telefone" name="telefone" type="tel" required value="<?php
                                                                                                          if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                                                                                            print_r($_SESSION["CLI-TEL"]);
                                                                                                          } else {
                                                                                                            echo "";
                                                                                                          } ?>">
            </div>
          </div>
        </div>

        <div class="endereco">
          <h3> Endereço</h3>
          <div>
            <div class="campos">
              <h4>CEP</h4>
              <input type="text" name="cep" id="cep" value="08253-000">
            </div>
            <div class="campos">
              <h4>Cidade</h4>
              <input type="text" name="cidade" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-CIDADE"]);
                                      } else {
                                        echo "";
                                      } ?>">
            </div>
            <div class="campos">
              <h4>Bairro</h4>
              <input type="text" name="bairro" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-BAIRRO"]);
                                      } else {
                                        echo "";
                                      } ?>">
            </div>
          </div>

          <div>
            <div class="campos">
              <h4>Número</h4>
              <input type="text" name="numero" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-NUMERO"]);
                                      } else {
                                        echo "";
                                      } ?>">
            </div>
            <div class="camposRua">
              <h4>Rua</h4>
              <input type="text" name="rua" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-LOGRADOURO"]);
                                      } else {
                                        echo "";
                                      } ?>">
            </div>
            <div class="camposRua">
              <h4>Complemento</h4>
              <input type="text" name="complemento" value="Prédio laranja">
            </div>
          </div>
        </div>

        <button type="submit" class="botaoSalvar">Salvar</button>
      </form>


    </div>



   


  </div>


  <script src="assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>


 



</body>

</html>