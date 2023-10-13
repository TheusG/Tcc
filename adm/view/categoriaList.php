<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../view/css/adm.css">
    <script>
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja apagar esse registro?");
            if(resp==true){
                location.href = "../controller/controller.php?categoria_delete=1&id=" + id;
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
        <h3>Lista de Categorias de Produtos</h3>
        
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $categoria = listarCategorias();
        ?>
        <table class = "admAdd">
            <tr>
                <td style="text-align: left;">
                <form name="formNew" action="categoriaNew.php" method="">
                        <input type="hidden" name="new" value="1">
                        <input type="submit" name="sbmt" value="Adicionar Categoria" style="cursor:pointer;background-color:forestgreen; color:white">
                </form>
                </td>
            </tr>
        
        </table>

        <table class = "tabelaAdm">
        <?php 
                if ($categoria["result"] == 0) {
                    echo "<tr><td>Nenhuma categoria encontrada...</tr></td>";
                }else{

                
            
            ?>
            <tr>
                <!-- <th class="tabelaAdmTh">Identificador</th> -->
                <th class="tabelaAdmTh">Nome</th>
                <th class="tabelaAdmTh">Comentário</th>
                <!-- <th class="tabelaAdmTh">Imagem</th> -->
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
             for($i = 1;$i<= $categoria["num"];$i++){
                echo "<tr>";
                    // echo "<td class=\"tabelaAdmTd\">".$categoria[$i]["Id_Categoria"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$categoria[$i]["Nome_Categoria"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$categoria[$i]["Comentario"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$categoria[$i]["Imagem"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="categoriaEdit.php" method="">
                        <input type="hidden" name="Id_Categoria" value="<?=$categoria[$i]["Id_Categoria"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver Mais" style="cursor:pointer">
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                    
                    <button class="deleteButton" onclick="confirmDelete(<?=$categoria[$i]['Id_Categoria'];?>)" style="cursor:pointer">Deletar</button>
                    
                    <?php
                    echo "</td>";
                
                echo "</tr>";
             }
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