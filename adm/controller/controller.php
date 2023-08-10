<?php 
    session_start();
    if(!isset($_SESSION["FUNC-ID"]) || empty($_SESSION["FUNC-ID"])){

        if(isset($_REQUEST["loginsenha"])){

            if(empty($_REQUEST["email"]) || empty($_REQUEST["senha"])){
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


            }
        }

    }else{

    }




?>