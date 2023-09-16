<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargos</title>
    <link rel="stylesheet" href="../view/css/adm.css">
    <script>
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja apagar esse cargo?");
            if(resp==true){
                location.href = "../controller/controller.php?cargo_delete=1&id=" + id;
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
        <h3>Lista de Cargos</h3>
        
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $cargo = listarCargo();
        ?>
        <table class = "admAdd">
            <tr>
                <td style="text-align: left;">
                <form name="formNew" action="cargoNew.php" method="">
                        <input type="hidden" name="new" value="1">
                        <input type="submit" name="sbmt" value="Adicionar Cargo" style="cursor:pointer;background-color:forestgreen; color:white">
                </form>
                </td>
            </tr>
        
        </table>

        <table class = "tabelaAdm">
            <tr>
                <!-- <th class="tabelaAdmTh">Identificador</th> -->
                <th class="tabelaAdmTh">Nome</th>

            </tr>
            <?php 
             for($i = 1;$i<= $cargo["num"];$i++){
                echo "<tr>";
                    echo "<td class=\"tabelaAdmTd\">".$cargo[$i]["Nome_Cargo"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="cargoEdit.php" method="">
                        <input type="hidden" name="Id_Cargo" value="<?=$cargo[$i]["Id_Cargo"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver Mais" style="cursor:pointer">
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                    
                    <button class="deleteButton" onclick="confirmDelete(<?=$cargo[$i]['Id_Cargo'];?>)" style="cursor:pointer">Deletar</button>
                    
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