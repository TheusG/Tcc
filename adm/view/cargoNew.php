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
            location.href = "cargoList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <br>
        <h3>Cargos da Five Stars</h3>
        <h4>Novo Cargo</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="cargoNew">
            <input type="hidden" name="cargo_new" value="value">            
               
            <label for="nome">Nome do Cargo</label><br>
            <input class="inputnome" type="text" name="nome" value="" required ><br>
                    
            <br>
            <input class="enviar" type="submit" name="sbmt" value="Enviar" style="cursor:pointer" ><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>
    </div>


</body>
</html>