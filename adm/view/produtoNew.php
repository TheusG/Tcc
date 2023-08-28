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
            location.href = "produtoList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <br>
        <h3>Produtos da Pizzaria</h3>
        <h4>Novo Produto</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="produtoNew">
            <input type="hidden" name="produto_new" value="1">            
                <div class="div3">
                    <div>
            <label for="nome">Nome do Produto</label><br>
            <input class="inputnome" type="text" name="nome" value="" required ><br>
                    </div>
                    <div>
            <label for="codigo">Código do Produto</label><br>
            <input class="inputEmail" type="number" name="codigo" value=""><br><br>
                    </div>
                    <div>
            <label for="descricao">Descrição do Produto</label><br>
            <textarea name="descricao" id="descricao" cols="30" rows="10" style="resize: none;" required></textarea>
                    </div>
                    <div>
            <label for="estoque">Estoque</label><br>
            <input class="inputnome" type="number" name="estoque" value=""><br>
                    </div>
                    <div>
            <label for="estoque_Min">Estoque Mínimo</label><br>
            <input class="inputnome" type="number" name="estoque_Min" value=""><br>
                    </div>
                    <div>
            <label for="estoque_Max">Estoque Máximo</label><br>
            <input class="inputnome" type="number" name="estoque_Max" value=""><br>
                    </div>
                    <div>
            <label for="valor">Valor</label><br>
            <input class="inputnome" type="number" step="0.01" name="valor" value="" required><br>
                    </div>
                    <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
            </select>
                    </div>
                    <div>
            <label for="nome">Imagem</label><br>
            <input class="inputnome" type="file" name="imagem" value=""><br>
                    </div>
                    <div>
            <label for="categoria">Categoria</label><br>
            <select name="categoria" id="categoria">
                <option value="1" selected>Pizza Salgado</option>
                <option value="2">Pizza Doce</option>
                <option value="3">Esfiha Salgado</option>
                <option value="4">Esfiha Doce</option>
                <option value="5">Bebida</option>
            </select>
                    </div>
                    <div>
            <input type="submit" name="sbmt" value="Enviar" ><br><br>
        </form>  
        <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>
    </div>


</body>
</html>