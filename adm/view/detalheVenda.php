
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
            location.href = "vendaList.php";
        }
    </script>
</head>
<body>
<?php 
        if(!isset($_REQUEST["Id_Venda"])){
            ?>  
                <form action="vendaList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value="FR08">
                </form>
                <script>
                    document.getElementById('myForm').submit()
                </script>
            <?php
            exit();
        }
        require_once "../model/Manager.php";
        $detalhe = detalheVenda($_REQUEST["Id_Venda"]);
        if($detalhe["result"] == 0){
            ?>  
                <form action="vendaList.php" name="form" id="myForm" method="post">
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
        <h3>Detalhe da Venda</h3>
        <h4>Editar Registro do Cliente</h4>
    </div>

 <div id="admForm">    <!---------------------------------------Fazer aqui ---------------------------->
        
            
           
    </div>

    <!---------------------------------------Fazer aqui ---------------------------->
    <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>


  
    <script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>
</body>
</html>