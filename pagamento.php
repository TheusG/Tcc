<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/pagamento.css">

  <title>Pagamento</title>
</head>

<body>
  <header>
    <div class="logo">
      <img src="image/logoPizzaria1.png" alt="">
    </div>
    <div class="quantidadeItem">
      <h2>Quantidade de item ($item$)</h2>
    </div>
  </header>
  <div class="conteinerPagamento">
    <div class="informacoes">
      <div class="nome">
        <h3> Identificação</h3>
        <div>
          <div class="campos">
            <h4>Nome</h4>
            <input type="text">
          </div>
          <div class="campos">
            <h4>Telefone</h4>
            <input type="text">
          </div>
        </div>
      </div>

      <div class="endereco">
        <h3> Endereço</h3>
        <div>
          <div class="campos">
            <h4>CEP</h4>
            <input type="text">
          </div>
          <div class="campos">
            <h4>Cidade</h4>
            <input type="text">
          </div>
          <div class="campos">
            <h4>Bairro</h4>
            <input type="text">
          </div>
        </div>

        <div>
          <div class="campos">
            <h4>Número</h4>
            <input type="text">
          </div>
          <div class="camposRua">
            <h4>Rua</h4>
            <input type="text">
          </div>
          <div class="camposRua">
            <h4>Complemento</h4>
            <input type="text">
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
          <input type="radio" value="<?=$info[$i]["Id_Pagamento"];?>" class="inputPagamento" name="Pagamento"> <p><?php echo $info[$i]["Nome_Pagamento"] ?></p>

        </div>
        <?php 
        }
        ?>

        </div>
      </div>




    </div>


    <div class="pedidos">
      <div class="resumo">
        <h4>Resumo do pedido</h4>

        <div class="pizzaName">
          <p>$nome da pizza$</p>
        </div>
        <div class="pizzaInfo">
          <p>$quantidade$</p>
          <p>$valor$</p>
        </div>




      </div>
      <p>$Valor total$</p>

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

</body>

</html>