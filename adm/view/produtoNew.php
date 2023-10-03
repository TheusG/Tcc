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
        <br>
    </div>

    

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="produtoNew">
            <input type="hidden" name="produto_new" value="1">            
                <div class="divFlex">
                    <div>
            <label for="nome">Código</label><br>
            <input class="inputCod" type="number" name="codigo" value="" required ><br>
                    </div>
                    <div>
            <label for="codigo">Produto</label><br>
            <input class="inputProduto fundoCinza" readonly type="text"   value=""><br><br>
                    </div>
                    <div>
                    <label for="valor">Valor</label><br>
                    <input class="inputValor fundoCinza" readonly  type="number" step="0.01"  value="" required><br>
                    </div>
                </div>   
            
                    <div class="divFlex">
                        <div class="estoque">
            <label for="estoque">Estoque</label><br>
            <input class="inputnome fundoCinza" type="number" readonly  value=""><br>
                        </div>
                        <div class="estoque">
            <label for="estoque_Min">Estoque Mínimo</label><br>
            <input class="inputnome fundoCinza" type="number" readonly  value=""><br>
                        </div>
                        <div class="estoque">
            <label for="estoque_Max">Estoque Máximo</label><br>
            <input class="inputnome fundoCinza" type="number" readonly  value=""><br>
                            </div>
                    </div>
                    <br>
         
                   <div class="divFlex">
                       <div class="divStatus">
                        <div>
            <label for="status">Status</label><br>
            <select  id="status" disabled class="fundoCinza">
                <option value="1" selected >Ativo</option>
                <option value="0" >Inativo</option>
            </select>   
                        </div>
                        <div>           
            <label for="categoria">Categoria</label><br>
                    <select  id="categoria" disabled class="fundoCinza">
                                <?php 
                        require_once "../model/Manager.php";
                        $categoria = todasCategorias();
                    ?>
                        <?php 
                            for($i = 1;$i<= $categoria["num"];$i++){
                                $idCat = $categoria[$i]["Id_Categoria"];
                                echo "<option value=\"$idCat\">".$categoria[$i]["Nome_Categoria"]."</option>";
                            }  
                        ?>
                     </select>
                        </div>
                        </div>
                    </div>
                    <br>
            <label for="descricao">Descrição do Produto</label><br>
            <textarea class="descricao fundoCinza"  readonly id="descricao" cols="30" rows="10" style="resize: none;" required></textarea><br>
            <br>
            <label for="nome">Imagem</label><br>
            <input class="inputnome" type="file" disabled  value=""><br>
            <br>
            <input class="enviar" id="enviar" type="submit" name="sbmt" value="Enviar" ><br><br>
        </form>  
        
        <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>

    </div>
  

</body>
</html>