
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
            location.href = "categoriaList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Id_Categoria"])){
            ?>  
                <form action="categoriaList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="BD06">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $categoria = pegaCategoria($_REQUEST["Id_Categoria"]);
        if($categoria["result"] == 0){
            ?>  
                <form action="categoriaList.php" name="form" id="myForm" method="post">
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
        <h3>Categorias de Produtos</h3>
        <h4>Editar Categoria</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="categoria_edit" value="1">
            <input type="hidden" name="id" value="<?=$categoria['Id_Categoria']?>">
            <div class="div3">
                <div>
            <label for="nome">Nome da Categoria</label><br>
            <input class="inputnome" type="text" name="nome" value="<?=$categoria['Nome_Categoria']?>"><br>
                </div>
                <div>
                    <div class="div1">
            <label for="comentario">Comentário</label><br>
            <textarea name="comentario" id="comentario" cols="30" rows="10"  style="resize: none;" value=""><?=$categoria['Comentario']?></textarea><br>
                    </div>
                </div><br>
            <label for="foto">Imagem</label><br>
            <input type="file" name="imagem" value="<?=$categoria["Imagem"]?>">
            <input type="submit" name="sbmt" value="Enviar" style="width: 50px; height: 20px;"><br><br>
        </form>
            
    </div>

    <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>

</body>
</html>