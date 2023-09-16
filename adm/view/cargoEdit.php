<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdmEdit</title>
    <link rel="stylesheet" href="css/adm.css">
    <script>
        function voltar() {
            location.href = "cargoList.php";
        }
    </script>
</head>

<body>
    <?php
    if (!isset($_REQUEST["Id_Cargo"])) {
    ?>
        <form action="cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD06">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
        exit();
    }
    require_once "../model/Manager.php";
    $cargo = pegaCargo($_REQUEST["Id_Cargo"]);
    if ($cargo["result"] == 0) {
    ?>
        <form action="cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD06">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
        exit();
    }



    ?>
    <div id="titulo">
        <h3>Cargos da Five Stars</h3>
        <h4>Editar Cargo</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="cargo_edit" value="1">
            <input type="hidden" name="id" value="<?= $cargo['Id_Cargo'] ?>">

            <label for="nome">Nome do Cargo</label><br>
            <input class="inputnome" type="text" name="nome" value="<?= $cargo['Nome_Cargo'] ?>"><br><br>

            <input class="enviar" type="submit" name="sbmt" value="Enviar"><br><br>
        </form>
        <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>

    </div>



</body>

</html>