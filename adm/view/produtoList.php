<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../view/css/adm.css">
    <script>
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja apagar esse registro?");
            if(resp==true){
                location.href = "../controller/controller.php?produto_delete=1&id=" + id;
            }else{
                return null;
            }
        }
    </script>
</head>
<body>
    
    <div id="admTabela">
        <br>
    <div id="titulo">
        <br>
        <h3>Lista de Produtos Five Stars</h3>
    
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $produto = listarProduto();
        ?>
        <table class = "admAdd">
            <tr>
                <td style="text-align: left;">
                <form name="formNew" action="produtoNew.php" method="">
                        <input type="hidden" name="new" value="1">
                        <input type="submit" name="sbmt" value="Adicionar Produto" style="background-color:forestgreen; color:white;">
                </form>
                </td>
            </tr>
        
        </table>

        <table class = "tabelaAdm">
            <tr>
                <!-- <th class="tabelaAdmTh">Identificador</th> -->
                <th class="tabelaAdmTh">Código</th>
                <th class="tabelaAdmTh">Nome</th>
                <!-- <th class="tabelaAdmTh">Descrição</th> -->
                <!-- <th class="tabelaAdmTh">Estoque</th>
                <th class="tabelaAdmTh">Estoque Mínimo</th>
                <th class="tabelaAdmTh">Estoque Maxímo</th> -->
                <th class="tabelaAdmTh">Valor</th>
                <th class="tabelaAdmTh">Status</th>
                <!-- <th class="tabelaAdmTh">Categoria</th> -->
                <!-- <th class="tabelaAdmTh">Imagem</th>               -->
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
             for($i = 1;$i<= $produto["num"];$i++){
                echo "<tr>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Id_Produto"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Cod_Produto"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Nome_Produto"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Desc_Produto"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Estoque"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Estoque_Min"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Estoque_Max"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">R$".$produto[$i]["Valor"]."</td>";
                    if($produto[$i]["Status_Produto"] == 1){
                        echo "<td class=\"tabelaAdmTd\">Ativo</td>";
                    }else{
                        echo "<td class=\"tabelaAdmTd\">Inativo</td>";
                    }
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Categoria"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$produto[$i]["Imagem"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="produtoEdit.php" method="">
                        <input type="hidden" name="Id_Produto" value="<?=$produto[$i]["Id_Produto"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver mais">
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                    
                    <button class="deleteButton" onclick="confirmDelete(<?=$produto[$i]['Id_Produto'];?>)">Deletar</button>
                    
                    <?php
                    echo "</td>";
                
                echo "</tr>";
             } 
            ?>
        </table>
    </div>

<?php 
if(isset($_REQUEST["msg"])){
    $cod = $_REQUEST["msg"];
    require_once "msg.php";
    echo "<script>alert('" . $MSG[$cod] . "');</script>";
}
      
?>
</body>
</html>