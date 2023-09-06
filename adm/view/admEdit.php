
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
        $dados = pegaFuncionario($_REQUEST["Id_Usuario"]);
        if($dados["result"] == 0){
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
        <h3>Funcionários da Five Stars</h3>
        <h4>Editar Registro do Funcionário</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="adm_edit" value="1">
            <input type="hidden" name="id" value="<?=$dados['Id_Usuario']?>">
            <div class="div3">
                <div>
            <label for="nome">Nome</label><br>
            <input class="inputnome" type="text" name="nome" value="<?=$dados['Nome_Usuario']?>"><br>
                </div>
                <div>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value="<?=$dados['Nascimento']?>"><br>
                </div>
                <div>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" <?php  echo $dados["Sexo"] == "m" ? "selected":"" ?>>Masculino</option>
                <option value="f" <?php  echo $dados["Sexo"] == "f" ? "selected":"" ?>>Feminino</option>
                <option value="n" <?php  echo $dados["Sexo"] == "n" ? "selected":"" ?>>Não-Binário</option>
            </select><br>
                </div>
                </div>
                <div class="div3">
                    <div>
            <label for="email">Email</label><br>
            <input class="inputEmail" type="email" name="email" value="<?=$dados['Email']?>" ><br>
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
            <input type="tel" name="telefone" id="telefone" value="<?=$dados['Telefone']?>"><br>
                        </div>
                        <div>    
            <label for="cep">cep</label><br>
            <input type="text" name="cep" id="cep" value="<?=$dados['Cep']?>"><br>
                        </div>
                        <div>
            <label for="Numero">Número</label><br>
            <input class="inputNumero" type="number" name="numero" value="<?=$dados['Numero']?>"><br>
                        </div>
                    </div>
                    <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value="<?=$dados['Complemento']?>"><br>
                    </div>
                    <div class="div1">
            <label for="cargo">Salário</label><br>
            <input type="text" name="salario" value="<?=$dados['Salario']?>"><br>
                    </div>
                    <div class="div1">
            <label for="cargo">Cargo</label><br>
            <select name="cargo" id="cargo">
                <option value="1" <?php echo  $dados["Cargo"] == "1" ? "selected":""?>>Gerente</option>
                <option value="2" <?php echo  $dados["Cargo"] == "2" ? "selected":""?>>Caixa</option>
                <option value="3" <?php echo  $dados["Cargo"] == "3" ? "selected":""?>>Balconista</option>
                <option value="4" <?php echo  $dados["Cargo"] == "4" ? "selected":""?>>Pizzaiolo</option>
                <option value="5" <?php echo  $dados["Cargo"] == "5" ? "selected":""?>>Ajudante Geral</option>
                <option value="6" <?php echo  $dados["Cargo"] == "6" ? "selected":""?>>Garçom</option>
            </select>
                    </div>
                    <div class="div1">
            <label for="perfil">Perfil</label><br>
            <input type="text" name="perfil" value="<?=$dados['Perfil']?>"><br>
                    </div>
                </div>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value="<?=$dados['Foto']?>"><br>
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