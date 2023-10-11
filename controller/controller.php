<?php
if (isset($_REQUEST["add_cliente"])) {
    $cliente["email"] = $_REQUEST["email"];


    if ($_REQUEST["senha"] == "" || $_REQUEST["confSenha"] == "") {
?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR01">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }

    if ($_REQUEST["senha"] != $_REQUEST["confSenha"]) {
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }

    require_once "../adm/model/Ferramentas.php";
    $cliente["senha"] = hash256($_REQUEST["senha"]);
    require_once "model/manager.php";
    $resp = adicionarCliente($cliente);

    if ($resp == 1) {
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR27">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
<?php
    }
}


?>