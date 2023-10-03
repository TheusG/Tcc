
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
            location.href = "produtoList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Codigo_Produto"])){
            ?>  
                <form action="produtoList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR01">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $produto = puxarProduto($_REQUEST["Codigo_Produto"]);
        if($produto["result"] == 0){
            ?>  
                <form action="produtoList.php" name="form" id="myForm" method="post">
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
        <!-- <h3>Código já utilizado</h3> -->
        <h4>Editar Produto</h4>
        <br>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="produto_edit" value="1">
            <input type="hidden" name="id" value="<?=$produto['Id_Produto']?>">
            <input type="hidden" name="cod" value="1">

                <div class="divFlex">
                    <div>
                <label for="nome">Nome do Produto</label><br>
            <input class="inputProduto" type="text" name="nome" value="<?=$produto["Nome_Produto"]?>" required ><br>
                    </div>
                    <div>
            <label for="codigo">Código</label><br>
            <input class="inputCod" type="number" name="codigo" value="<?=$produto["Cod_Produto"]?>"><br>
                    </div>
                    <div>
            <label for="valor">Valor</label><br>
            <input class="inputValor" type="number" name="valor" step="0.01" value="<?=$produto["Valor"]?>" required><br><br>
                    </div>
                    </div>
                    <div class="divFlex">
                        <div class="estoque">
            <label for="estoque">Estoque</label><br>
            <input class="inputnome" type="number" name="estoque" value="<?=$produto["Estoque"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="estoque_Min">Estoque Mínimo</label><br>
            <input class="inputnome" type="number" name="estoque_Min" value="<?=$produto["Estoque_Min"]?>"><br>
                        </div>
                        <div class="estoque">
            <label for="estoque_Max">Estoque Máximo</label><br>
            <input class="inputnome" type="number" name="estoque_Max" value="<?=$produto["Estoque_Max"]?>"><br>
                        </div>
                    </div>
                    <br>
            
                    <div class="divFlex">
                        <div class="divStatus">
                            <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="1" <?php  echo $produto["Status_Produto"] == "1" ? "selected":"" ?>>Ativo</option>
                <option value="0" <?php  echo $produto["Status_Produto"] == "0" ? "selected":"" ?>>Inativo</option>
            </select>
                        </div>
           
                    <div>
            <label for="categoria">Categoria</label><br>
            <select name="categoria" id="categoria">
                <?php 
                    require_once "../model/Categoria.class.php";
                    $categoria = new Categoria();
                    $dados = $categoria->pegaTodasCategorias();

                    for($i = 0;$i < count($dados);$i++){
                ?>

                <option value="<?=$dados[$i]["Id_Categoria"];?>" <?php if($dados[$i]["Id_Categoria"] == $produto["Categoria"]){
                    echo "selected";
                    }else{
                        echo "";
                    } ?>>
                    <?php echo $dados[$i]["Nome_Categoria"] ?>
                </option>

                <?php 
                    }
                
                ?>
                        
            </select>

            
            </div>
                    </div>
                </div>  
                <br>   
            <label for="descricao">Descrição do Produto</label><br>
            <textarea class="descricao" name="descricao" id="descricao" cols="30" rows="10" style="resize: none;" required><?=$produto["Desc_Produto"]?></textarea>
               <br>
            <label for="nome">Imagem</label><br>
            <input class="inputnome" type="file" name="imagem" value="<?=$produto["Imagem"]?>"><br><br>
                   
            <input class="enviar" type="submit" name="sbmt" value="Editar" style="cursor:pointer"><br><br>
            
          
        </form>
        <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
            
    </div>

    <?php
        if (isset($_REQUEST["msg"])) {
            $cod = $_REQUEST["msg"];
            require_once "msg.php";
            echo "<script>alert('" . $MSG[$cod] . "');</script>";
        }

        ?>


</body>
</html>