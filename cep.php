<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/pagamento.css">
  <link rel="website icon" type="png" href="image/logoPizzaria1.png">

  <title>Pagamento</title>
</head>

<body>
  <?php

$cliente = "";
if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
   $cliente = $_SESSION["ID-CLI"];
} else {
  $cliente = "";
}

  require_once "model/Carrinho.class.php";
  $carrinho = new Carrinho();
  $infoProduto = $carrinho->mostrarCarrinho($cliente);
  $total = 0;
  $totalItens = 0;
 
  ?>

 


  <header>
    <div class="logo">
      <img src="image/logoPizzaria1.png" alt="">
    </div>

    <div class="quantidadeItem">
      <h2>Quantidade de itens ( <?php 
      for ($i = 0; $i < count($infoProduto); $i++) {
        $totalItens = $totalItens +  $infoProduto[$i]["Quantidade"];
      
      }
      
      echo $totalItens;
      ?>

      
    )</h2>
    </div>
  </header>
  <div class="conteinerPagamento">
    <div class="informacoes">
      
    <form action="controller/controller.php">
    <input type="hidden" name="validaCep">
      
      <div class="endereco">
        <h3> Informe o Endereço de Entrega</h3>
        <div>
          <div class="campos">
            <h4>CEP</h4>
            
            <input type="text" required name="cep" value="<?php
                                          if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0 && $_SESSION["CLI-ID-CEP"] != "69690" ) {
                                            print_r($_SESSION["CLI-CEP"]);
                                          } else {
                                             echo "";
                                          } ?>">
          </div>
          <div class="campos">
            <h4>Cidade</h4>
            <input type="text" readonly value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-CIDADE"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
          <div class="campos">
            <h4>Bairro</h4>
            <input type="text" readonly value="<?php
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
            <input type="text" required name="numero" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-NUMERO"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
          
          <div class="camposRua">
            <h4>Referência</h4>
            <input type="text" required name="complemento" value="<?php
                                        if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                          print_r($_SESSION["CLI-COMPLEMENTO"]);
                                        } else {
                                         echo "";
                                        } ?>">
          </div>
        </div>
      </div>
      
      <!-- <input type="hidden" name="confirmarCompra" > -->


    </div>



    <div class="pedidos">
      <div class="resumo">
        <h4>Resumo do pedido</h4>

        <?php
        for ($i = 0; $i < count($infoProduto); $i++) {

        ?>
          <div class="pizzaName">
            <p><?php
                print_r($infoProduto[$i]["Nome_Produto"]);
                ?>
            </p>
          </div>
          <div class="pizzaInfo">
            <p><?php
                print_r($infoProduto[$i]["Quantidade"]);
                ?>
              X</p>
            <p>R$<?php
                  $valor = $infoProduto[$i]["Valor_Unitario"];
                  print_r(number_format($valor, 2, ",", "."));
                  ?></p>
          </div>



        <?php
          $total = $total + $infoProduto[$i]["SubTotal"];
        }
        ?>

      </div>
      <p>R$<?php echo number_format($total, 2, ",", ".");?></p>

      <input type="hidden" name="Id_Cliente" value="<?php
                                                          if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                                            echo $_SESSION["ID-CLI"];
                                                          } else {
                                                            echo "0";
                                                          }  ?>">
      
      <input type="hidden" name="Id_Usuario" value="<?php
                                                          if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                                            echo $_SESSION["CLI-ID"];
                                                          } else {
                                                            echo "0";
                                                          }  ?>">

      <input type="hidden" name="total" value="<?=$total?>">

      <button class="botaoComprar" type="submit">Confirmar compra</button>

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