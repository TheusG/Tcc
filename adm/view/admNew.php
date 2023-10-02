
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
            location.href = "admList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <br>
        <h3>Funcionários da Five Stars</h3>
        <h4>Novo Funcionário</h4>
    </div>

    <div id="admForm"><!-- esta no adm.css -->
        <form action="../controller/controller.php" method="post" name="admNew">
            <input type="hidden" name="adm_new" value="value">
            
                <div class="div3">
                    <div>
            <label for="Nome">Nome</label><br>
            <input class="inputnome" type="text" name="nome" value="" required ><br>
                    </div>
                    <div>
            <label for="dataNascimento">Data de Nascimento</label><br>
            <input type="date" name="dataNascimento" value=""><br>
                    </div>
                    <div>
            <label for="sexo">Gênero</label><br>
            <select name="sexo" id="sexo">
                <option value="m" selected>Masculino</option>
                <option value="f">Feminino</option>
                <option value="n">Não-Binário</option>
            </select><br>
                    </div>
                </div>   

                <div class="div3">
                    <div>
            <label for="email">Email</label><br>
            <input class="inputEmail" type="email" name="email" value="" required><br>
                    </div>
                    <div>
            <label for="senha">Senha</label><br>
            <input  class="inputSenha" type="password" name="senha" value="" required><br>
                    </div>
                </div>
           

            <div class="box">
            
                <div class="div2">
                    <div>
                    <label for="telefone">Telefone</label><br>
            <input type="tel" id="telefone" name="telefone" placeholder="(99)99999-9999" value=""><br> 
                    </div>
                    <div>
            <label for="cep">Cep</label><br>
            <input type="text" id="cep" name="cep" placeholder="99999-999" value=""><br>
                    </div>
                    <div>
            <label for="Numero">Número</label><br>
            <input class="inputNumero" type="number" name="numero" value=""><br>
                    </div>
                    
                </div>
                <div class="div1">
            <label for="complemento">Complemento</label><br>
            <input type="text" name="complemento" value=""><br>
                </div>    
            </div>
                <div class="div1">
            <label for="salario">Salário</label><br>
            <input type="number" name="salario" value=""><br>
                </div>    
                <div class="div1">
            <label for="perfil">Poder</label><br>
            <input type="radio" name="perfil" value="1" checked>Total
            <input type="radio" name="perfil" value="2">Parcial
            <input type="radio" name="perfil" value="3">Mínimo
            <br>
                </div>    
                <div class="div1">
            <label for="cargo">Cargo</label><br>
            <select name="cargo" id="cargo">
            <?php 
                        require_once "../model/Manager.php";
                        $cargo = todosCargos();
                    ?>
                        <?php 
                            for($i = 1;$i<= $cargo["num"];$i++){
                                $idCargo = $cargo[$i]["Id_Cargo"];
                                echo "<option value=\"$idCargo\">".$cargo[$i]["Nome_Cargo"]."</option>";
                            }  
                        ?>
            </select>
                </div>    
            
           
            <label for="foto">Foto</label><br>
            <input class="inputImage" type="file" name="foto" value=""><br>
            <br>
            <input class="enviar" type="submit" name="sbmt" value="Enviar" ><br><br>
        </form>
            <button class="voltar" id="btnVoltar" onclick="voltar();">Voltar</button>
    </div>
            
    <script src="../../assets/js/bibliotecaj/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/bibliotecaj/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

    <script>
          $('#telefone').mask('(00) 00000-0000');
          $('#cep').mask('00000-000')
    </script>


</body>
</html>