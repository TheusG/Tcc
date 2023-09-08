
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EntregadorEdit</title>
    <link rel="stylesheet" href="css/adm.css">
    <script>
        function voltar(){
            location.href = "entregadorList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Id_Usuario"])){
            ?>  
                <form action="entregadorList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR08">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $entregador = pegaEntregador($_REQUEST["Id_Usuario"]);
        if($entregador["result"] == 0){
            ?>  
                <form action="entregadorList.php" name="form" id="myForm" method="post">
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
        <h3>Entregadores da Five Stars</h3>
        <h4>Editar Registro do Entregador</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="entregador_edit" value="1">
            <input type="hidden" name="id" value="<?=$entregador['Id_Usuario']?>">
            <input type="hidden" name="idEntregador" value="<?=$entregador['Usuario']?>">
            <div class="div3">
                <div>
            <label for="nome">Nome</label><br>
            <input class="inputnome" type="text" name="nome" value="<?=$entregador['Nome_Usuario']?>"><br>
                </div>
                <div>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value="<?=$entregador['Nascimento']?>"><br>
                </div>
                <div>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" <?php  echo $entregador["Sexo"] == "m" ? "selected":"" ?>>Masculino</option>
                <option value="f" <?php  echo $entregador["Sexo"] == "f" ? "selected":"" ?>>Feminino</option>
                <option value="n" <?php  echo $entregador["Sexo"] == "n" ? "selected":"" ?>>Não-Binário</option>
            </select><br>
                </div>
                </div>
                <div class="div3">
                    <div>
            <label for="email">Email</label><br>
            <input class="inputEmail" type="email" name="email" value="<?=$entregador['Email']?>" ><br>
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
            <input type="tel" name="telefone" id="telefone" value="<?=$entregador['Telefone']?>"><br>
                        </div>
                        <div>    
            <label for="cep">cep</label><br>
            <input type="text" name="cep" id="cep" value="<?=$entregador['Cep']?>"><br>
                        </div>
                        <div>
            <label for="Numero">Número</label><br>
            <input class="inputNumero" type="number" name="numero" value="<?=$entregador['Numero']?>"><br>
                        </div>
                    </div>
                    <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value="<?=$entregador['Complemento']?>"><br>
                    </div>
                    <div class="div1">
            <label for="perfil">Veículo</label><br>
            <input type="text" maxlength="10" name="veiculo" value="<?=$entregador['Veiculo']?>"><br>
                    </div>
                    <div class="div1">
            <label for="perfil">Identificação</label><br>
            <input type="text" maxlength="45" name="identificacao" value="<?=$entregador['Identificacao']?>"><br>
                    </div>
                </div>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value="<?=$entregador['Foto']?>"><br>
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