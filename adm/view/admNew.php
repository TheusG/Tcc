
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
        <br>
        <h3>Funcionários da Five Stars</h3>
        <h4>Novo Funcionário</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="adm_new" value="value">
            <div class="divForm1">
            <label for="Nome">Nome</label><br>
            <input type="text" name="nome" value="" required ><br>
            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" value=""><br>

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
           
           

            <div class="box">
                <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value=""><br>
                </div>

                <div class="div2">
                    <div>
            <label for="cep">Cep</label><br>
            <input type="text" name="cep" value=""><br>
                    </div>
                    <div>
            <label for="Numero">Número</label><br>
            <input type="number" name="numero" value=""><br>
                    </div>
                    <div>
                    <label for="dataNascimento">Data de Nascimento</label><br>
                    <input type="date" name="dataNascimento" value=""><br>
                    </div>
                </div>    
            </div>
           
            <label for="foto">Foto</label><br>
            <input type="file" name="foto" value=""><br>
            <input type="submit" name="sbmt" value="Enviar" ><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>
    </div>


</body>
</html>