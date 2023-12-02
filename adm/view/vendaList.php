<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Etec</title>
    <link rel="stylesheet" href="../view/css/adm.css">
    <script>
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja apagar esse registro?");
            if(resp==true){
                location.href = "../controller/controller.php?cliente_delete=1&id=" + id;
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
        <h3> Relatório de Vendas</h3>
        
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $venda = listarVenda();
        ?>
        <table class = "admAdd">
            <tr>
                <td style="text-align: left;">
                <form name="formNew" action="vendaNew.php" method="">
                        <input type="hidden" name="new" value="1">
                        <input type="submit" name="sbmt" value="Adicionar Venda" style="background-color:forestgreen; color:white;cursor:pointer;">
                </form>
                </td>
            </tr>
        
        </table>

        <?php  
     
        ?>

        <table class = "tabelaAdm">
            <?php 
                if ($venda["result"] == 0) {
                    echo "<tr><td>Nenhuma venda encontrado...</tr></td>";
                }else{

                
            
            ?>

            <tr>
                <!-- <th class="tabelaAdmTh">Id_Venda</th> -->
                <th class="tabelaAdmTh">Nro_Venda</th>
                <!-- <th class="tabelaAdmTh">Cliente</th> -->
                <th class="tabelaAdmTh">Data_Venda</th>
                <!-- <th class="tabelaAdmTh">Entregador</th> -->
                <th class="tabelaAdmTh">Status</th>
                <th class="tabelaAdmTh">Valor_Venda</th>
                <!-- <th class="tabelaAdmTh">Desconto_Venda</th>
                <th class="tabelaAdmTh">Adicional_Venda</th> -->
                <th class="tabelaAdmTh">Pagamento</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
             for($i = 1;$i<= $venda["num"];$i++){
                echo "<tr>";
                    // echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Id_Venda"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Nro_Venda"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Cliente"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Data_Venda"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Entregador"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Status"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Valor_Venda"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Desconto_Venda"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Adicional_Venda"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$venda[$i]["Pagamento"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="vendaEdit.php" method="">
                        <input type="hidden" name="Id_Venda" value="<?=$venda[$i]["Id_Venda"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver Mais" style="cursor:pointer">
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                    
                    <button class="deleteButton" onclick="confirmDelete(<?=$venda[$i]['Id_Venda'];?>)" style="cursor:pointer;">Deletar</button>
                    
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