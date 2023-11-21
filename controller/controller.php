<?php

session_start();
// session_destroy();
// exit();



if (!isset($_SESSION["CLI-ID"]) || empty($_SESSION["CLI-ID"])) {

    if (isset($_REQUEST["validaCliente"])) {

        if (empty($_REQUEST["email"]) || empty($_REQUEST["senha"])) {
            session_destroy();
            $_SESSION["LOGADO"] = 0;

?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR01">
                <!-- Dado(s) não preenchido(s) -->
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
            <?php
        } else {
            require_once "../model/Ferramentas.php";
            $respEmail = antiInjection($_REQUEST["email"]);
            $respSenha = antiInjection($_REQUEST["senha"]);

            if ($respEmail == 0 || $respSenha == 0) {
                session_destroy();
                $_SESSION["LOGADO"] = 0;
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR11">
                    <!-- "FR11" => "Informação incorreta.", -->
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            }

            require_once "../model/Ferramentas.php";
            $senhaHash = hash256($_REQUEST["senha"]);
            require_once "../model/manager.php";
            $cliente = dadosCliente($_REQUEST["email"], $senhaHash);

            if ($cliente["result"] == 1) {
                $_SESSION["CLI-ID"] = $cliente["Id_Usuario"];
                $_SESSION["CLI-NOME"] = $cliente["Nome_Usuario"];
                $_SESSION["CLI-EMAIL"] = $cliente["Email"];
                $_SESSION["CLI-CEP"] = $cliente["Id"];
                $_SESSION["CLI-NUMERO"] = $cliente["Numero"];
                $_SESSION["CLI-BAIRRO"] = $cliente["Bairro"];
                $_SESSION["CLI-CIDADE"] = $cliente["Cidade"];
                $_SESSION["CLI-COMPLEMENTO"] = $cliente["Complemento"];
                $_SESSION["CLI-LOGRADOURO"] = $cliente["Logradouro"];
                $_SESSION["CLI-CEP"] = $cliente["Id"];
                $_SESSION["ID-CLIENTE"] = $cliente["Id_Cliente"];
                $_SESSION["LOGADO"] = 1;


            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR54">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            } else {
                session_destroy();
                $_SESSION["LOGADO"] = 0;
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR02">
                    <!-- "FR02" => "Preechimento incorreto.", -->
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
    <?php

            }
        }
    }
} else {
    $_SESSION["LOGADO"] = 1;
    ?>
    
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR29">
        </form>
        <script>
             document.getElementById('myForm').submit()
        </script>
    <?php
}



if (isset($_REQUEST["add_cliente"])) {
    $cliente["email"] = $_REQUEST["email"];

    require_once "../model/Cliente.class.php";
    $dados = new Cliente;
    $EmailCliente = $dados->EmailCliente();
    $controle = 1;

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

    if ($_REQUEST["senha"] == "" || $_REQUEST["confSenha"] == "" || $cliente["email"] == "" && $controle != 0) {
        ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR01">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    } else if ($_REQUEST["senha"] != $_REQUEST["confSenha"] && $controle != 0) {
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
        <?php

    } else if ($controle != 0) {
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
}

