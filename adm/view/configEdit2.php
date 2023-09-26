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
            location.href = "bemvindo.php";
        }
        function telaEditar(){
            location.href = "configEdit.php";
        }
    </script>
</head>

<body>
    <?php
    require_once "../model/Manager.php";
    $config = pegaConfig();
    if ($config["result"] == 0) {
    ?>
        <form action="bemvindo.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD06">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
        exit();
    }



    ?><br>
    <div id="titulo">
        <h3></h3>
        <h4>Editar Configurações</h4>
        <br>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="config_edit" value="1">
            <input type="hidden" name="id" value="<?= $config['Id_Config'] ?>">

            <div class="divFlex">
                <div>
                    <label for="data">Data</label><br>
                    <input class="inputProduto fundoCinza" readonly type="date" name="data" value="<?= $config["Data"] ?>" required maxlength="60"><br><br>
                </div>

                <div>
                    <label for="abre">Abertura</label><br>
                    <input class="inputFantasia fundoCinza" readonly type="text" name="abre" value="<?= $config["Abre"] ?>" ><br><br>
                </div>

            </div>
            <div class="divFlex">

                <div>
                    <label for="fecha">Fechamento</label><br>
                    <input class="inputProduto fundoCinza" readonly type="text" name="fecha" id="fecha" value="<?= $config["Fecha"]?>"><br><br>
                </div>

                <div>
                    <label for="pedido">Nr.Pedido</label><br>
                    <input class="inputnome fundoCinza" readonly id="pedido" type="number" name="pedido" value="<?= $config["NrPedido"] ?>" required maxlength="18"><br><br>
                </div>

            </div>
            <div class="divFlex">
                <div>
                    <label for="mensagem">Mensagem</label><br>
                    <textarea class="descricao fundoCinza" readonly name="mensagem" id="mensagem" cols="30" rows="10" style="resize: none;" required><?= $config["Mensagem"] ?></textarea>
                </div>
                
            <!-- </div> -->
            <br>

            <input class="enviar" type="button" onclick="telaEditar();"value="Editar" ><br><br>


        </form>
        <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>


    </div>


    <script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
        $('#telefone').mask('(00) 00000-0000');
        
    </script>

    <?php
    if (isset($_REQUEST["msg"])) {
        $cod = $_REQUEST["msg"];
        require_once "msg.php";
        echo "<script>alert('" . $MSG[$cod] . "');</script>";
    }

    ?>

</body>

</html>