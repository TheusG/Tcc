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


  <header>
    <div class="logo">
      <img src="image/logoPizzaria1.png" alt="">
    </div>
    <div class="quantidadeItem">
      <h2>Quantidade de itens ( <?php 
      for ($i = 0; $i < count($qtdeProduto); $i++) {
        print_r($qtdeProduto[$i]["total_linhas"]);
      
      }?>

      
    )</h2>
    </div>
  </header>
  <div class="conteinerPagamento">
    <div class="informacoes">
      <div class="nome">
        <h3> Identificação</h3>
        <div>
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
            <input type="text" value="08253-000">
          </div>
          <div class="campos">
            <h4>Cidade</h4>
            <input type="text" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-CIDADE"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
          <div class="campos">
            <h4>Bairro</h4>
            <input type="text" value="<?php
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
            <input type="text" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-NUMERO"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
          <div class="camposRua">
            <h4>Rua</h4>
            <input type="text" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-LOGRADOURO"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
          <div class="camposRua">
            <h4>Complemento</h4>
            <input type="text" value="<?php
                                      if (isset($_SESSION["LOGADO"]) && $_SESSION["LOGADO"] = !0) {
                                        print_r($_SESSION["CLI-COMPLEMENTO"]);
                                      } else {
                                        echo "";
                                      } ?>">
          </div>
        </div>
      </div>

      <div class="endereco">
        <h3> Formas de pagamento</h3>
        <div class="inputBox">
          <?php
          require_once "model/Pagamento.class.php";
          $pagamento = new Pagamento();
          $info = $pagamento->tiposPagamento();

          for ($i = 0; $i < count($info); $i++) {
          ?>
            <div class="opcoesPagamento">
              <input type="radio" value="<?= $info[$i]["Id_Pagamento"]; ?>" class="inputPagamento" name="Pagamento">
              <p><?php echo $info[$i]["Nome_Pagamento"] ?></p>

            </div>
          <?php
          }
          ?>
          
        </div>
     
      </div>

      <div class="endereco">
        <h3>Forma de entrega</h3>
        <div class="inputBox">
      
            <div class="opcoesPagamento">
              <input type="radio" value="" class="inputPagamento" name="entrega">
              <p>Delivery</p>
             
            </div>
            <div class="opcoesPagamento">
            <input type="radio" value="" class="inputPagamento" name="entrega">
              <p>Retirar no local</p>
             
            </div>
        
        
          
        </div>
     
      </div>
    


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
                  print_r($infoProduto[$i]["Valor_Unitario"]);
                  ?></p>
          </div>



        <?php
          $total = $total + $infoProduto[$i]["Valor_Unitario"];
        }
        ?>

      </div>
      <p>R$<?= $total ?></p>

      <button class="botaoComprar">Confirmar compra</button>


    </div>


  </div>

  <!-- 
    <div class="nome">
      <h3>1 identificação</h3>
      <div>
          <div>
              <h4>Nome</h4>
              <input type="text">
          </div>
          <div>
              <h4>telefone</h4>
              <input type="text">
          </div>      

      </div>
  </div> 

  <div class="nome">
      <h4>Endereço</h4>
  <div class="conteinerEndereco">
      <div class="padrao">
        <h3>Cep</h3>

        <input type="text">
        
      </div>
      <div class="padrao">
        <h3>Numero</h3>
        <input type="text" name="" id="" value="">
      </div>

      <div class="padrao">
        <h3>Cidade</h3>
        <input type="text" name="" id="" value="">
      </div>
    </div> -->


  <!-- 
    <div class="conteinerEndereco">
    
      <div class="padrao2">
        <h3>Rua</h3>
        <input type="text" name="" id="" value="">
      </div>
      <div class="padrao">
        <h3>bairro</h3>
        <input type="text" name="" id="" value="">
      </div>

   
    </div>

    <div class="conteinerEndereco">
      <div class="padrao2">
        <h3>Complemento</h3>
        <input type="text" name="" id="" value="">
      </div>
      <div class="padrao">
        <h3>logradouro</h3>

        <input type="text" name="" id="" value="">
      </div>
      

    </div>

  </div>

</div>
</div> -->

  <script src="assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
  <script src="assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>



  <script>
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000')
  </script>

</body>

</html>