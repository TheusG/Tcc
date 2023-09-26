<?php
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/adm.css">
    <script src="../libs/jquery.min.js"></script>
    <script>
        function ExecutaLogout() {
            var resp = confirm('Deseja sair?');
            if (resp == true) {
                location.href = "admLogout.php";
            } else {
                return null;
            }
        }
    </script>
</head>

<body>
    <header>
        <div class="logo">



            <img src="img/logo pizzaria1.png" alt="Logo">

            <?php
            require_once "../model/Empresa.class.php";
            $empresa = new Empresa();
            $info = $empresa->infoEmpresa();
 
           
            ?>
            <p><?php for ($i = 0; $i < count($info); $i++){
                echo $info[$i]["Fantasia"];
            }?></p>
            <i class="fa-solid fa-pizza-slice"></i>

        </div>

        <div class="dadosUsuario">
            <br>

            Nome:<?= $_SESSION["FUNC-NOME"] ?><br>
            E-mail:<?= $_SESSION["FUNC-EMAIL"] ?> <br>

            <!-- Cargo:<br> -->

        </div>
        <button class="sair" onclick="ExecutaLogout();">Sair</button>
    </header>
    <div class="conteiner">
        <div class="menu">
            <a href="admList.php" target="screen">Funcionários</a>
            <a href="entregadorList.php" target="screen">Entregadores</a>
            <a href="produtoList.php" target="screen">Produtos</a>
            <a href="categoriaList.php" target="screen">Categorias</a>
            <a href="cargoList.php" target="screen">Cargos</a>
            <a href="configEdit2.php" target="screen">Configurações</a>
            <a href="empresaEdit2.php" target="screen">Empresa</a>

        </div>
        <div class="ipres">
            <iframe name="screen" id="screen" width="100%" height="1180px" src="bemvindo.php" style="border: 0px;"></iframe>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/5bb743cf48.js" crossorigin="anonymous"></script>


</body>

</html>