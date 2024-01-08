
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

    <div id="admForm"><!-- esta no adm.css -->
        
            <div class="div3">
            
                <div>
            <label for="nome">Nome dos Produtos</label><br>
            <input class="inputnome" type="text" name="nome" value="<?=$detalhe[1]['Nome_Produto']?>"><br>
                </div>
                <div>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value="<?=$detalhe['Nome_Produto']?>"><br>
                </div>
            </div>
                <div class="div3">
                    <div>
            <label for="email">Email</label><br>
            <input class="inputEmail" type="email" name="email" value="<?=$detalhe['Val_Total']?>" ><br>
                    </div>
                    
                </div>
                <div class="box">
                    <div class="div2">
                        <div>
            <label for="telefone">Telefone</label><br>
            <input type="tel" name="telefone" id="telefone" value="<?=$detalhe['Val_Unitario']?>"><br>
                        </div>
                        <div>    
            <label for="cep">Cep</label><br>
            <input type="text" name="cep" id="cep" value="<?=$detalhe['Quantidade']?>"><br>
                        </div>
                        <div>
            <label for="Numero">Número</label><br>
            <input class="inputNumero" type="number" name="numero" value="<?=$detalhe['Cliente']?>"><br>
                        </div>
                    </div>
                    <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value="<?=$detalhe['Cod_Produto']?>"><br>
                    </div>
                    <div class="div1">
                    <label for="referencia">Ponto de Referência</label><br>
            <textarea class="descricao" name="referencia"  id="descricao" cols="30" rows="10" style="resize: none;" ><?=$detalhe['Quantidade']?></textarea><br>
            <br>
                    </div>
                <br>
            
        </form>
           
    </div>
    <button class="voltar" id="btnVoltar" onclick="voltar();">&larr;</button>


  
    <script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>
</body>
</html>