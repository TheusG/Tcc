<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link rel="stylesheet" href="../view/css/adm.css">
    
</head>
<body>
    
    <div id="admTabela">
        <br>
    <div id="titulo">
        <br>
        <h3>Informações da  Five Stars</h3>
    
        <br><br>
    </div>

        <?php 
            require_once "../model/Manager.php";
            $empresa = listarEmpresa();
        ?>
        
        <table class = "tabelaAdm">
            <tr>
                <th class="tabelaAdmTh">Identificador</th>
                <th class="tabelaAdmTh">Nome</th>
                <th class="tabelaAdmTh">Nome Fantasia</th>
                <th class="tabelaAdmTh">Cnpj</th>
                <th class="tabelaAdmTh">Inscrição Estadual</th>             
                <th class="tabelaAdmTh">Cep</th>
                <!-- <th class="tabelaAdmTh">Endereco</th>
                <th class="tabelaAdmTh">Numero</th>
                <th class="tabelaAdmTh">Bairro</th>              
                <th class="tabelaAdmTh">Cidade</th>
                <th class="tabelaAdmTh">Uf</th>               -->
                <th class="tabelaAdmTh">Telefone</th>
                <th class="tabelaAdmTh">Site</th>
                <th class="tabelaAdmTh">Data</th>
                <th class="tabelaAdmTh">Logo</th>              
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
             for($i = 1;$i<= $empresa["num"];$i++){
                echo "<tr>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Id_Empresa"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Nome_Empresa"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Fantasia"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Cnpj"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Ie"]."</td>";
                    echo "<td id=\"cep\" class=\"tabelaAdmTd\">".$empresa[$i]["Cep"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Endereco"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Numero"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Bairro"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Cidade"]."</td>";
                    // echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Uf"]."</td>";
                    echo "<td id=\"telefone\" class=\"tabelaAdmTd\">".$empresa[$i]["Telefone"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Site"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Data"]."</td>";
                    echo "<td class=\"tabelaAdmTd\">".$empresa[$i]["Logo"]."</td>";
                    echo "<td>"
                    ?>
                    <form name="formEdit" action="empresaEdit.php" method="">
                        <input type="hidden" name="Id_Empresa" value="<?=$empresa[$i]["Id_Empresa"];?>">
                        <input class="editButton" type="submit" name="sbmt" value="Ver mais">
                    </form>
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

<script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>
</body>
</html>