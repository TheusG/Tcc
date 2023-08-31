
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdmEdit</title>
    <link rel="stylesheet" href="css/adm.css">
    <script>
        function voltar(){
            location.href = "empresaList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Id_Empresa"])){
            ?>  
                <form action="empresaList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="BD06">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $empresa = pegaEmpresa($_REQUEST["Id_Empresa"]);
        if($empresa["result"] == 0){
            ?>  
                <form action="empresaList.php" name="form" id="myForm" method="post">
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
        <h3></h3>
        <h4>Editar Empresa</h4>
        <br>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="empresa_edit" value="1">
            <input type="hidden" name="id" value="<?=$empresa['Id_Empresa']?>">

                <div class="divFlex">
                    <div>
                <label for="nome">Nome</label><br>
            <input class="inputProduto" type="text" name="nome" value="<?=$empresa["Nome_Empresa"]?>" required maxlength="60"><br>
                    </div>
                    <div>
            <label for="fantasia">Fantasia</label><br>
            <input class="inputCod" type="text" name="fantasia" value="<?=$empresa["Fantasia"]?>" required maxlength="20"><br>
                    </div>
                    <div>
            <label for="cnpj">Cnpj</label><br>
            <input class="inputValor" type="number" name="cnpj" value="<?=$empresa["Cnpj"]?>" required maxlength="11" ><br>
                    </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="estoque">Inscrição Estadual</label><br>
            <input class="inputnome" type="number" name="ie" value="<?=$empresa["Ie"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="cep">CEP</label><br>
            <input class="inputnome" type="number" name="cep" value="<?=$empresa["Cep"]?>" maxlength="8" ><br>
                        </div>
                        <div class="estoque">
            <label for="endereco">Endereço</label><br>
            <input class="inputnome" type="text" name="endereco" maxlength="50" value="<?=$empresa["Endereco"]?>" ><br>
                        </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="numero">Número</label><br>
            <input class="inputnome" type="number" name="numero" maxlength="10" value="<?=$empresa["Numero"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="bairro">Bairro</label><br>
            <input class="inputnome" type="text" name="bairro" maxlength="10" value="<?=$empresa["Bairro"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="cidade">Cidade</label><br>
            <input class="inputnome" type="text" name="cidade" maxlength="10" value="<?=$empresa["Cidade"]?>"><br>
                        </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="uf">UF</label><br>
            <input class="inputnome" type="text" name="uf" maxlength="2" value="<?=$empresa["Uf"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="telefone">Telefone</label><br>
            <input class="inputnome" type="number" name="telefone" maxlength="11" value="<?=$empresa["Telefone"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="site">Site</label><br>
            <input class="inputnome" type="text" name="site" maxlength="50" value="<?=$empresa["Site"]?>"><br>
                        </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="data">Data</label><br>
            <input class="inputnome" type="date" name="data" value="<?=$empresa["Data"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="logo">Logo</label><br>
            <input class="inputnome" type="text" name="logo" maxlength="30" value="<?=$empresa["Logo"]?>"><br>
                        </div>
                    </div>
                    <br>
                             
            <input type="submit" name="sbmt" value="Enviar" ><br><br>
            
            <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
        </form>
            
    </div>


</body>
</html>