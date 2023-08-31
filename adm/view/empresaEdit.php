
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
    
        

    ?><br>
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
            <input class="inputProduto" type="text" name="nome" value="<?=$empresa["Nome_Empresa"]?>" required maxlength="60"><br><br>
                    </div>
                   
                    <div>
            <label for="fantasia">Fantasia</label><br>
            <input class="inputFantasia" type="text" name="fantasia" value="<?=$empresa["Fantasia"]?>" required maxlength="20"><br><br>
                    </div>
                    
                    </div>
                    <div class="divFlex">
             
                        <div>
            <label for="estoque">Inscrição Estadual</label><br>
            <input class="inputProduto" type="number" name="ie" value="<?=$empresa["Ie"]?>"><br><br>
                        </div>
         
                                 <div>
            <label for="cnpj">Cnpj</label><br>
            <input class="inputnome" type="number" name="cnpj" value="<?=$empresa["Cnpj"]?>" required maxlength="11" ><br><br>
                    </div>
      
                    </div>
                    <div class="divFlex">
                                <div>
            <label for="endereco">Endereço</label><br>
            <input class="inputProduto" type="text" name="endereco" maxlength="50" value="<?=$empresa["Endereco"]?>" ><br><br>
                        </div>
                                        <div>
            <label for="cep">CEP</label><br>
            <input class="inputFantasia" type="number" name="cep" value="<?=$empresa["Cep"]?>" maxlength="8" ><br><br>
                        </div>

                    </div>
                    <div class="divFlex">
           
                        <div class="divEndereco">
            <label for="bairro">Bairro</label><br>
            <input class="inputnome" type="text" name="bairro" maxlength="10" value="<?=$empresa["Bairro"]?>"><br><br>
                        </div>
                        <div class="divEndereco">
            <label for="cidade">Cidade</label><br>
            <input class="inputnome" type="text" name="cidade" maxlength="10" value="<?=$empresa["Cidade"]?>"><br><br>
                        </div>
                        <div class="divEndereco">
            <label for="numero">Número</label><br>
            <input class="inputUf" type="number" name="numero" maxlength="10" value="<?=$empresa["Numero"]?>"><br><br>
                        </div>
                        <div cclass="divEndereco">
            <label for="uf">UF</label><br>
            <input style="width:80px" type="text" name="uf" maxlength="2" value="<?=$empresa["Uf"]?>"><br><br>
                        </div>
           
                    </div>
                    <div class="divFlex">
                    <div class="estoque">
            <label for="telefone">Telefone</label><br>
            <input class="inputnome" type="number" name="telefone" maxlength="11" value="<?=$empresa["Telefone"]?>"><br><br>
                        </div>
                 
                        <div class="estoque">
            <label for="site">Site</label><br>
            <input class="inputnome" type="text" name="site" maxlength="50" value="<?=$empresa["Site"]?>"><br><br>
                        </div>
                        <div class="estoque">
            <label for="logo">Logo</label><br>
            <input class="inputnome" type="text" name="logo" maxlength="30" value="<?=$empresa["Logo"]?>"><br><br>
                        </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="data">Data</label><br>
            <input class="inputnome" type="date" name="data" value="<?=$empresa["Data"]?>"><br><br>
                        </div>
           
                    </div>
                    <br>
                             
            <input class="enviar" type="submit" name="sbmt" value="Enviar" ><br><br>
            
            
        </form>
        <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
            
    </div>


</body>
</html>