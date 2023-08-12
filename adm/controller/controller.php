<?php 
//toda a vez  que for mandar um formulario para o index, antes tem que detruir da sessão
    session_start();
    
    
    
    
    
    if(!isset($_SESSION["FUNC-ID"]) || empty($_SESSION["FUNC-ID"])){

        if(isset($_REQUEST["loginsenha"])){

            if(empty($_REQUEST["email"]) || empty($_REQUEST["senha"])){
                session_destroy();
                    //deu erro no login 
                ?>  
                    <form action="../index.php" name="form" id="myForm" method="post">
                        <input type="hidden" name="msg" value="FR01">
                    </form>
                    <script>
                        document.getElementById('myForm').submit()
                    </script>
                <?php
            
            }else{
                //deu certo o login
                //Verificação de anti-injection
                require_once"../model/Ferramentas.php";
                $respEmail = antiInjection($_REQUEST["email"]);
                $respSenha = antiInjection($_REQUEST["senha"]);
                if($respEmail == 0 || $respSenha == 0){//tentativa de ataque injection
                    session_destroy();
                    ?>  
                        <form action="../index.php" name="form" id="myForm" method="post">
                            <input type="hidden" name="msg" value="FR11">
                        </form>
                        <script>
                            document.getElementById('myForm').submit()
                        </script>
                    <?php

                }

                //Autenticação de email e senha do login do adm
                require_once"../model/Ferramentas.php";
                $senhaHash = hash256($_REQUEST["senha"]);
               
                require_once "../model/Manager.php";
                $dados = dadosFuncionario($_REQUEST["email"],$senhaHash);

                if($dados["result"] == 1){//email e senha certa
                    $_SESSION["FUNC-ID"] = $dados["Id_Usuario"];
                    $_SESSION["FUNC-NOME"] = $dados["Nome_Usuario"];
                    $_SESSION["FUNC-EMAIL"] = $dados["Email"];
                    // $_SESSION["FUNC-CARGO"] = $dados["Cargo"];
                    // $_SESSION["FUNC-NOME-CARGO"] = $dados["Nome_Cargo"];
                    // $_SESSION["FUNC-NOME_CARGO"] = $dados["Nome_Cargo"];


                    ?>  
                        <form action="../view/adm.php" name="form" id="myForm" method="post">
                            <input type="hidden" name="result" value="validado">
                        </form>
                        <script>
                            document.getElementById('myForm').submit()
                        </script>
                    <?php
                    

                }else{
                    session_destroy();
                    ?>  
                        <form action="../index.php" name="form" id="myForm" method="post">
                            <input type="hidden" name="msg" value="FR02">
                        </form>
                        <script>
                            document.getElementById('myForm').submit()
                        </script>
                    <?php
                }
            }
        }

    }else{//caso tenha sessão

        if($_REQUEST["adm_new"]){
            $dados["nome"] = $_REQUEST["nome"];
            $dados["sexo"] = $_REQUEST["sexo"];
            $dados["email"] = $_REQUEST["email"];
            require_once "../model/Ferramentas.php";
            $dados["senha"] = hash256($_REQUEST["senha"]);
            $dados["telefone"] = $_REQUEST["telefone"];
            $dados["dataNascimento"] = $_REQUEST["dataNascimento"];
            $dados["cep"] = $_REQUEST["cep"];
            $dados["numero"] = $_REQUEST["numero"];
            $dados["complemento"] = $_REQUEST["complemento"];
            $dados["foto"] = $_REQUEST["foto"];
            require_once "../model/Manager.php";
            $resp = adicionarFuncionario($dados);
            
            if($resp == 1){//tudo certo ao adicionar um novo funcionario
                ?>  
                    <form action="../view/admList.php" name="form" id="myForm" method="post">
                        <input type="hidden" name="msg" value="BD52">
                    </form>
                    <script>
                        document.getElementById('myForm').submit()
                    </script>
                 <?php
            }else{//erro no insert
                ?>  
                    <form action="../view/admList.php" name="form" id="myForm" method="post">
                        <input type="hidden" name="msg" value="BD02">
                    </form>
                    <script>
                        document.getElementById('myForm').submit()
                    </script>
                 <?php
            }
            
        }

    }




?>