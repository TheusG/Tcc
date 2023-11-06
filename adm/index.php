<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração</title>
  <link rel="stylesheet" href="view/css/style.css">
  <link rel="website icon" type="png" href="../image/logoPizzaria1.png">
</head>

<body>
  <?php
  require_once "model/Empresa.class.php";
  $empresa = new Empresa();
  $info = $empresa->infoEmpresa();



  ?>

  <div class="formulario">
    <div class="imagem-form">
      <img src="../image/<?php for ($i = 0; $i < count($info); $i++) {
                            echo $info[$i]["Logo"];
                          } ?>" alt="Logo">

      <h2> <i class="fa-solid fa-star"></i> 
      <?php for ($i = 0; $i < count($info); $i++) {
        echo $info[$i]["Fantasia"];
      } ?> 
      <i class="fa-solid fa-star"></i></h2>
      <h2>Tela de login dos administradores</h2>
      <br>
    </div>
    <form action="controller/controller.php" method="post">
  <input type="hidden" name="loginsenha" value="1">
  <h3>Email</h3>
  <input type="email" name="email" id="email" class="campo">
  <br><br>
  <h3>Senha</h3>
  <div class="divCampo">
    <input type="password" name="senha" id="senha" class="campo">
    <button type="button" id="check"><i id="checkIcon" class="fa-solid fa-eye-slash"></i></button>
  </div>
  <br><br><br>
  <input type="submit" id="enviar" value="Entrar">

  <script>
    const checkButton = document.querySelector('#check');
    const checkIcon = document.querySelector('#checkIcon');
    const senhaInput = document.querySelector('#senha');

    checkButton.addEventListener('click', () => {
      if (senhaInput.type === "password") {
        senhaInput.type = "text";
        checkIcon.classList.remove('fa-eye-slash');
        checkIcon.classList.add('fa-eye');
      } else {
        senhaInput.type = "password";
        checkIcon.classList.remove('fa-eye');
        checkIcon.classList.add('fa-eye-slash');
      }
    });
  </script>
</form>


        <!-- <script>

          const checkButton = document.querySelector('#check');
          const senhaInput = document.querySelector('#senha');
          checkButton.addEventListener('click', () => {
            senha.type = "text";
           });
        
        

          // check.onclick = togglePassword;
          // function togglePassword(){
          //   if(check.checked) senha.type = "text";
          //   else senha.type = "password";
          // }


        </script> -->

    </form>
    
 

  </div>
  <style>
    body {
      background-color: #252525;
    }
  </style>

  <?php
  if (isset($_REQUEST["msg"])) {
    $cod = $_REQUEST["msg"];
    require_once "view/msg.php";
    echo "<script>alert('" . $MSG[$cod] . "');</script>";
  }

  ?>

<script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>
</body>

</html>