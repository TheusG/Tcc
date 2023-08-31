
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
        if(!isset($_REQUEST["Id_Produto"])){
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
        require_once "../model/Manager.php";
        $produto = pegaProduto($_REQUEST["Id_Produto"]);
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
        <h3>Categorias de Produtos</h3>
        <h4>Editar Categoria</h4>
        <br>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="produto_edit" value="1">
            <input type="hidden" name="id" value="<?=$produto['Id_Produto']?>">

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
                <option value="1" <?php  echo $produto["Categoria"] == "1" ? "selected":"" ?>>Pizza Salgado</option>
                <option value="2" <?php  echo $produto["Categoria"] == "2" ? "selected":"" ?>>Pizza Doce</option>
                <option value="3" <?php  echo $produto["Categoria"] == "3" ? "selected":"" ?>>Esfiha Salgado</option>
                <option value="4" <?php  echo $produto["Categoria"] == "4" ? "selected":"" ?>>Esfiha Doce</option>
                <option value="5" <?php  echo $produto["Categoria"] == "5" ? "selected":"" ?>>Bebida</option>
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
                   
            <input class="enviar" type="submit" name="sbmt" value="Enviar" ><br><br>
            
          
        </form>
        <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>
            
    </div>


</body>
</html>