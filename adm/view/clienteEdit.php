
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
            location.href = "admList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Id_Usuario"])){
            ?>  
                <form action="admList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR08">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $cliente = pegaCliente($_REQUEST["Id_Usuario"]);
        if($cliente["result"] == 0){
            ?>  
                <form action="admList.php" name="form" id="myForm" method="post">
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
        <h3>Clientes da Five Stars</h3>
        <h4>Editar Registro do Cliente</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="cliente_edit" value="1">
            <input type="hidden" name="id" value="<?=$cliente['Id_Usuario']?>">
            <input type="hidden" name="idCliente" value="<?=$cliente['Usuario']?>">
            <div class="div3">
                <div>
            <label for="nome">Nome</label><br>
            <input class="inputnome" type="text" name="nome" value="<?=$cliente['Nome_Usuario']?>"><br>
                </div>
                <div>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value="<?=$cliente['Nascimento']?>"><br>
                </div>
                <div>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" <?php  echo $cliente["Sexo"] == "m" ? "selected":"" ?>>Masculino</option>
                <option value="f" <?php  echo $cliente["Sexo"] == "f" ? "selected":"" ?>>Feminino</option>
                <option value="n" <?php  echo $cliente["Sexo"] == "n" ? "selected":"" ?>>Não-Binário</option>
            </select><br>
                </div>
                </div>
                <div class="div3">
                    <div>
            <label for="email">Email</label><br>
            <input class="inputEmail" type="email" name="email" value="<?=$cliente['Email']?>" ><br>
                    </div>
                    <div>
            <label for="senha"><u>Nova</u> Senha (<i>Não obrigatório</i>)</label><br>
            <input class="inputSenha" type="password" name="senha" value="" ><br>
                    </div>
                </div>
                <div class="box">
                    <div class="div2">
                        <div>
            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" id="telefone" value="<?=$cliente['Telefone']?>"><br>
                        </div>
                        <div>    
            <label for="cep">cep</label><br>
            <input type="text" name="cep" id="cep" value="<?=$cliente['Cep']?>"><br>
                        </div>
                        <div>
            <label for="Numero">Número</label><br>
            <input class="inputNumero" type="number" name="numero" value="<?=$cliente['Numero']?>"><br>
                        </div>
                    </div>
                    <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value="<?=$cliente['Complemento']?>"><br>
                    </div>
                    <div class="div1">
                    <label for="referencia">Ponto de Referência</label><br>
            <textarea class="descricao" name="referencia"  id="descricao" cols="30" rows="10" style="resize: none;" ><?=$cliente['Referencia']?></textarea><br>
            <br>
                    </div>
                <br>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value="<?=$cliente['Foto']?>"><br>
            <input  class="enviar" type="submit" name="sbmt" value="Enviar"><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>



  
    <script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>
</body>
</html>