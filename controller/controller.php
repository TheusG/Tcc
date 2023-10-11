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

    if($_REQUEST["senha"] != $_REQUEST["confSenha"]) {
        ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR04">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
        <?php
        
        }

        require_once "model/Ferramentas.php";

        $cliente["senha"] = hash256($_REQUEST["senha"]);






        }




        ?>




        if (isset($_REQUEST["adm_new"])) {
        $dados["nome"] = $_REQUEST["nome"];
        $dados["sexo"] = $_REQUEST["sexo"];
        $dados["email"] = $_REQUEST["email"];
        require_once "../model/Ferramentas.php";
        $dados["senha"] = hash256($_REQUEST["senha"]);
        $dados["telefone"] = $_REQUEST["telefone"];
        $dados["dataNascimento"] = $_REQUEST["dataNascimento"];
        $dados["cep"] = $_REQUEST["cep"];
        $dados["numero"] = $_REQUEST["numero"];
        $dados["complemento"] = $_REQUEST["complemento"];
        $dados["foto"] = $_REQUEST["foto"];
        $dados["salario"] = $_REQUEST["salario"];
        $dados["perfil"] = $_REQUEST["perfil"];
        $dados["cargo"] = $_REQUEST["cargo"];
        require_once "../model/Manager.php";
        $resp = adicionarFuncionario($dados);

        if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
        ?>
        <form action="../view/admList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD52">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/admList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD02">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
<?php
    }
}
