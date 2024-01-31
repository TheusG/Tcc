<?php

session_start();
// session_destroy();
// exit();

// if (isset($_REQUEST["addCarrinho"])) {
//     $login = $_REQUEST["Usuario"];
//     $Valor = $_REQUEST["Valor"];
//     $id = $_REQUEST["Cod_Produto"];
//     $Id_Cliente = $_REQUEST["Id_Cliente"];



//     if ($login == 0) {


//         require "../model/Carrinho.class.php";
//         $produto = new Carrinho();
//         $carrinho = $produto->mostrarCarrinho();

//         for($i=0;$i < count($carrinho);$i++){
//             if($carrinho[$i]["Cod_Produto"] == $id && $carrinho[$i]["Quantidade"] >= 1){
//                 $quantidade = $carrinho[$i]["Quantidade"] + 1;

//                 require_once "../model/manager.php";
//                 $resp = adicionarCarrinho($id, $Valor,$quantidade);

//                 if ($resp == 1) {
//                     header('Location:../cardapio.php');
//                     exit;
//                 } else {
//                 
//                 }

//             }else{
//                 $quantidade = 1;

//                 require_once "../model/manager.php";
//                 $resp = adicionarCarrinho($id, $Valor,$quantidade);

//                 if ($resp == 1) {
//                     header('Location:../cardapio.php');
//                     exit;
//                 } else {
//                 
//                 }
//             }
//         }


//     }
// }

if (isset($_REQUEST["addCarrinho"])) {
    $login = $_REQUEST["Usuario"];
    $Valor = $_REQUEST["Valor"];
    $id = $_REQUEST["Cod_Produto"];
    $cliente = $_REQUEST["Id_Cliente"];



    if ($login == 0) {
?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR30">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
        <?php
    } else {

        require_once "../model/Carrinho.class.php";
        $produto = new Carrinho();
        $carrinho = $produto->mostrarCarrinho($cliente);
        $quantidade = 1;
        $subTotal = $Valor;
        $valida = 0;


        for ($i = 0; $i < count($carrinho); $i++) {
            if ($carrinho[$i]["Cod_Produto"] == $id && $carrinho[$i]["Quantidade"] >= 1) {
                $quantidade = $carrinho[$i]["Quantidade"] + 1;
                $subTotal = $Valor * $quantidade;
                $valida = 1;
            }
        }


        require_once "../model/manager.php";
        $resp = adicionarCarrinho($id, $Valor, $quantidade, $subTotal, $cliente);

        if ($resp == 1) {
            header('Location:../cardapio.php');
            exit;
        } else {
        ?>
            <form action="../cardapio.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="OP08">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
            <?php
        }
    }
}



if (isset($_REQUEST["confirmarDados"])) {
    $cliente["nome"] = $_REQUEST["nome"];
    $cliente["email"] = $_REQUEST["email"];
    $cliente["telefone"] = $_REQUEST["telefone"];
    $cliente["id"] = $_REQUEST["Id_Usuario"];
    $cliente["complemento"] = $_REQUEST["complemento"];
    $cliente["numero"] = $_REQUEST["numero"];

    $cliente["cep"] = $_REQUEST["cep"];
    $valida = "0";



    require_once "../adm/model/Cep.class.php";
    $verificaCep = new Cep();
    $infoCep = $verificaCep->TodosCep();

    for ($i = 0; $i < count($infoCep); $i++) {
        if ($infoCep[$i]["Cep"] == $cliente["cep"]) {
            $valida = "1";
            $cliente["cep"] = $infoCep[$i]["Id_Cep"];

            require_once "../model/manager.php";
            $resp = atualizarCliente($cliente);

            if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="BD53">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            } else { //erro no insert
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="BD03">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
        <?php
            }
        }
    }

    if ($valida != 1) {
        ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR100">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }
}


if (isset($_REQUEST["item_delete"])) {
    $id = $_REQUEST["id"];
    $cliente = $_REQUEST["cliente"];
    require_once "../model/manager.php";
    $result = itemDelete($id, $cliente);

    if ($result == 1) { //conseguir excluir
        header('Location:../cardapio.php');
        exit;
    } else { //algo deu de errado na deleção
    ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
        <?php
    }
}


if (isset($_REQUEST["confirmarCompra"])) {

    $cliente = $_REQUEST["Id_Cliente"];

    require_once "../model/Carrinho.class.php";
    $produto = new Carrinho();
    $carrinho = $produto->mostrarCarrinho($cliente);

    $infoCliente["usuario"] = $_REQUEST["Id_Usuario"];
    $infoCliente["telefone"] = $_REQUEST["telefone"];
    $infoCliente["nome"] = $_REQUEST["nome"];


    //Caso for Delivery--------------------//
    $_SESSION["NOME"] = $_REQUEST["nome"];
    $_SESSION["TELEFONE"] = $_REQUEST["telefone"];
    $_SESSION["PAGAMENTO"] = $_REQUEST["pagamento"];
    $_SESSION["ENTREGA"] = $_REQUEST["entrega"];
    //----------------------------------------//

    $venda["pagamento"] = $_REQUEST["pagamento"];
    $venda["entrega"] = $_REQUEST["entrega"];
    $venda["total"] = $_REQUEST["total"];

    if ($venda["entrega"] == 63) {

        require_once "../adm/model/Config.class.php";
        $config = new Config();
        $nrPedido = $config->numeroPedido();

        $pedido = $nrPedido[0]["NrPedido"] + 1;

        require_once "../model/manager.php";
        $resp = adicionarVenda($venda, $carrinho, $pedido, $cliente, $infoCliente);

        if ($resp == 1) {
        ?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR55">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php

        } else {
        ?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR31">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        }
    } else {
        header('Location:../cep.php');
        exit;
    }
}

if (isset($_REQUEST["validaCep"])) {

    // ---Info do Cliente--
    $infoCliente["id"] = $_REQUEST["Id_Cliente"];
    $infoCliente["usuario"] = $_REQUEST["Id_Usuario"];
    $infoCliente["telefone"] = $_SESSION["TELEFONE"];
    $infoCliente["nome"] = $_SESSION["NOME"];
    
    //----Info da Venda
    $venda["pagamento"] = $_SESSION["PAGAMENTO"];
    $venda["entrega"] = $_SESSION["ENTREGA"];
    $venda["total"] = $_REQUEST["total"];

    //-----Carrinho do Cliente
    require_once "../model/Carrinho.class.php";
    $produto = new Carrinho();
    $carrinho = $produto->mostrarCarrinho($infoCliente["id"]);

    //--PEDIDO----------------------
    require_once "../adm/model/Config.class.php";
    $config = new Config();
    $nrPedido = $config->numeroPedido();
    $pedido = $nrPedido[0]["NrPedido"] + 1;
   
    //----Verificação do Cep informado
    $cep = $_REQUEST["cep"];
    $numero = $_REQUEST["numero"];
    $complemento = $_REQUEST["complemento"];
    $valida = "0";


    
    
    require_once "../adm/model/Cep.class.php";
    $verificaCep = new Cep();
    $infoCep = $verificaCep->TodosCep();

    for ($i = 0; $i < count($infoCep); $i++) {
        if($cep == $infoCep[$i]["Cep"]){
            $cliente["cep"] = $infoCep[$i]["Id_Cep"];
            $valida = 1;

            require_once "../model/manager.php";
            $resp = confirmaCompraCep($cliente,$numero,$complemento,$venda,$infoCliente,$pedido, $carrinho);

            if ($resp == 1) {
             ?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR55">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
             <?php

             }else{
                ?>
            <form action="../index.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR31">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
             }

        }

    }

    if ($valida != 1) {
        ?>
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="FR100">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php

    }

    


}

// --------------------------------------------------------//-------------------------------------------------
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
                $_SESSION["CLI-TEL"] = $cliente["Telefone"];
                $_SESSION["CLI-ID-CEP"] = $cliente["Id_Cep"];
                $_SESSION["CLI-NUMERO"] = $cliente["Numero"];
                $_SESSION["CLI-BAIRRO"] = $cliente["Bairro"];
                $_SESSION["CLI-CIDADE"] = $cliente["Cidade"];
                $_SESSION["CLI-COMPLEMENTO"] = $cliente["Complemento"];
                $_SESSION["CLI-LOGRADOURO"] = $cliente["Logradouro"];
                $_SESSION["CLI-CEP"] = $cliente["Cep"];
                $_SESSION["ID-CLI"] = "KKKKKKK";

                require_once "../model/Cliente.class.php";
                $todosCliente = new Cliente();
                $cliente = $todosCliente->todosClientes();

                for ($i = 1; $i < count($cliente); $i++) {
                    if ($_SESSION["CLI-ID"] == $cliente[$i]["Usuario"]) {
                        $_SESSION["ID-CLI"] = $cliente[$i]["Id_Cliente"];
                    }
                }



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
        $respEmail = antiInjection($cliente["email"]);
        $respSenha = antiInjection($_REQUEST["senha"]);
        $respConfSenha = antiInjection($_REQUEST["confSenha"]);

        if ($respEmail == 0 || $respSenha == 0 || $respConfSenha == 0) {
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
        $cliente["senha"] = hash256($_REQUEST["senha"]);
        require_once "../model/Cliente.class.php";
        require_once "../model/manager.php";
        $resp = adicionarCliente($cliente);

        if ($resp == 1) {


            // require_once "../model/manager.php";
            // $cliente = InfoCliente($cliente["email"], $cliente["senha"]);
            require_once "../model/Cliente.class.php";
            $infoCliente = new Cliente();
            $info = $infoCliente->InfoCliente($cliente["email"], $cliente["senha"]);

            for ($i = 0; $i < count($info); $i++) {

                $_SESSION["CLI-ID"] = $info[$i]["Id_Usuario"];
                $_SESSION["CLI-NOME"] = $info[$i]["Nome_Usuario"];
                $_SESSION["CLI-EMAIL"] = $info[$i]["Email"];
                $_SESSION["CLI-TEL"] = $info[$i]["Telefone"];
                $_SESSION["CLI-ID-CEP"] = $info[$i]["Id_Cep"];
                $_SESSION["CLI-NUMERO"] = $info[$i]["Numero"];
                $_SESSION["CLI-BAIRRO"] = $info[$i]["Bairro"];
                $_SESSION["CLI-CIDADE"] = $info[$i]["Cidade"];
                $_SESSION["CLI-COMPLEMENTO"] = $info[$i]["Complemento"];
                $_SESSION["CLI-LOGRADOURO"] = $info[$i]["Logradouro"];
                $_SESSION["CLI-CEP"] = $info[$i]["Cep"];
                $_SESSION["ID-CLI"] = "";

                require_once "../model/Cliente.class.php";
                $todosCliente2 = new Cliente();
                $cliente = $todosCliente2->todosClientes();

                for ($i = 1; $i < count($cliente); $i++) {
                    if ($_SESSION["CLI-ID"] == $cliente[$i]["Usuario"]) {
                        $_SESSION["ID-CLI"] = $cliente[$i]["Id_Cliente"];
                    }
                }

                $_SESSION["LOGADO"] = 1;
            }
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
