
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Etec</title>
    <link rel="stylesheet" href="css/adm.css">
    <script>
        function voltar(){
            location.href = "admList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <h3>Funcionários da Five Stars</h3>
        <h4>Novo Funcionário</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="adm_new" value="value">
            <label for="Nome">Nome</label><br>
            <input type="text" name="nome" value="" required ><br>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" selected>Masculino</option>
                <option value="f">Feminino</option>
                <option value="n">Não-Binário</option>
            </select><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="" required><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha" value="" required><br>
            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" value=""><br>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value=""><br>
            <label for="cep">cep</label><br>
            <input type="text" name="cep" value=""><br>
            <label for="Numero">Número</label><br>
            <input type="number" name="numero" value=""><br>
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value=""><br>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value=""><br>
            <input type="submit" name="sbmt" value="Enviar"><br><br>
        </form>
            <button class="" id="btnVoltar" onclick="voltar();">&larr;</button>
            




    </div>


</body>
</html>