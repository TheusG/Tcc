
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
            <input type="hidden" name="adm_edit" value="value">
            <input type="hidden" name="id" value="<?=$dados['Id_Usuario']?>">
            <label for="nome">Nome</label><br>
            <input type="text" name="nome" value="<?=$dados['Nome_Usuario']?>"><br>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" <?php  echo $dados["Sexo"] == "m" ? "selected":"" ?>>Masculino</option>
                <option value="f" <?php  echo $dados["Sexo"] == "f" ? "selected":"" ?>>Feminino</option>
                <option value="n" <?php  echo $dados["Sexo"] == "n" ? "selected":"" ?>>Não-Binário</option>
            </select><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="<?=$dados['Email']?>" ><br>
            <label for="senha"><u>Nova</u> Senha (<i>Não obrigatório</i>)</label><br>
            <input type="password" name="senha" value=""><br>
            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" value="<?=$dados['Telefone']?>"><br>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value="<?=$dados['Nascimento']?>"><br>
            <label for="cep">cep</label><br>
            <input type="text" name="cep" value="<?=$dados['Cep']?>"><br>
            <label for="Numero">Número</label><br>
            <input type="number" name="numero" value="<?=$dados['Numero']?>"><br>
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value="<?=$dados['Complemento']?>"><br>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value="<?=$dados['Foto']?>"><br>
            <input type="submit" name="sbmt" value="Enviar"><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

  


</body>
</html>