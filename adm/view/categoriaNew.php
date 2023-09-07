
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
            location.href = "categoriaList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <br>
        <h3>Categoria de Produtos</h3>
        <h4>Nova Categoria</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="categoriaNew">
            <input type="hidden" name="categoria_new" value="value">            
               
            <label for="nome">Nome da Categoria</label><br>
            <input class="inputnome" type="text" name="nome" value="" required ><br>
                    
            <label for="comentario">Comentário</label><br>
            <textarea class="descricao" name="comentario" id="comentario" cols="30" rows="10" style="resize: none;"></textarea><br>
                 
            <label for="imagem">Imagem</label><br>
            <input class="inputImage" type="file" name="imagem" value=""><br>
            <br>
            <input class="enviar" type="submit" name="sbmt" value="Enviar" style="cursor:pointer" ><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>
    </div>


</body>
</html>