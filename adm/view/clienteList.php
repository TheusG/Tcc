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
        <h3> Lista de Clientes da Five Stars</h3>
        
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $cliente = listarCliente();
        ?>
        <table class = "admAdd">
            <tr>
                <td style="text-align: left;">
                <form name="formNew" action="clienteNew.php" method="">
                        <input type="hidden" name="new" value="1">
                        <input type="submit" name="sbmt" value="Adicionar Cliente" style="background-color:forestgreen; color:white;cursor:pointer;">
                </form>
                </td>
            </tr>
        
        </table>

        <?php  
     
        ?>

        <table class = "tabelaAdm">
            <?php 
                if ($cliente["result"] == 0) {
                    echo "<tr><td>Nenhum cliente encontrado...</tr></td>";
                }else{

                
            
            ?>

            <tr>
                <!-- <th class="tabelaAdmTh">Identificador</th> -->
                <th class="tabelaAdmTh">Nome</th>
                <!-- <th class="tabelaAdmTh">Gênero</th> -->
                <th class="tabelaAdmTh">Email</th>
                <th class="tabelaAdmTh">Telefone</th>
                <!-- <th class="tabelaAdmTh">Cep</th> -->
                <!-- <th class="tabelaAdmTh">Complemento</th>
                <th class="tabelaAdmTh">Número</th> -->
                <th class="tabelaAdmTh">Data de Nascimento</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
             for($i = 1;$i<= $cliente["num"];$i++){
                echo "<tr>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Id_Usuario"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$cliente[$i]["Nome_Usuario"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">";
                    //     if($dados[$i]["Sexo"] == "m" || $dados[$i]["Sexo"] == "M"){
                    //         echo "Masculino";
                    //     }else if($dados[$i]["Sexo"] == "f" || $dados[$i]["Sexo"] == "F"){
                    //         echo "Feminino";
                    //     }else{
                    //         echo "Não Binário";
                    //     }
                    // "</td>";
                    echo "<td class=\"tabelaAdmTd\">".$cliente[$i]["Email"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$cliente[$i]["Telefone"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Cep"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Complemento"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Numero"]."</td>";
                     // Obtém a data no formato padrão do PHP (ano-mês-dia)

                    // Formata a data no padrão dia/mês/ano
                    $dataFormatada = date('d/m/Y', strtotime($cliente[$i]["Nascimento"]));
 
                    echo "<td class=\"tabelaAdmTd\">".$dataFormatada."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Cargo"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Salario"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$dados[$i]["Perfil"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="clienteEdit.php" method="">
                        <input type="hidden" name="Id_Usuario" value="<?=$cliente[$i]["Id_Usuario"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver Mais" style="cursor:pointer">
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>";
                    ?>
                    
                    <button class="deleteButton" onclick="confirmDelete(<?=$cliente[$i]['Id_Usuario'];?>)" style="cursor:pointer;">Deletar</button>
                    
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