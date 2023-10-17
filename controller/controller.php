<?php


if (isset($_REQUEST["add_cliente"])) {
    $cliente["email"] = $_REQUEST["email"];

    require_once "../model/Cliente.class.php";
    $dados = new Cliente;
    $EmailCliente = $dados->EmailCliente();
    $controle =1;

    for ($i = 0; $i < count($EmailCliente); $i++) {
        if ($EmailCliente[$i]["Email"] == $cliente["email"]) {
        ?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR28">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
           
        <?php
         $controle = 0;
        }
    }
    
    if ($_REQUEST["senha"] == "" || $_REQUEST["confSenha"] == "" || $cliente["email"] == "" && $controle !=0) {
?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR01">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }else if($_REQUEST["senha"] != $_REQUEST["confSenha"] && $controle != 0) {
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }else if($controle !=0){
        require_once "../model/Ferramentas.php";
    $cliente["senha"] = hash256($_REQUEST["senha"]);
    require_once "../model/manager.php";
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
    }else{ //erro no insert
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
   
}


?>