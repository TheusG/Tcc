


<?php
//toda a vez  que for mandar um formulario para o index, antes tem que detruir da sessão
session_start();



if (!isset($_SESSION["FUNC-ID"]) || empty($_SESSION["FUNC-ID"])) {

    if (isset($_REQUEST["loginsenha"])) {

        if (empty($_REQUEST["email"]) || empty($_REQUEST["senha"])) {
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

        } else {
            //deu certo o login
            //Verificação de anti-injection
            require_once "../model/Ferramentas.php";
            $respEmail = antiInjection($_REQUEST["email"]);
            $respSenha = antiInjection($_REQUEST["senha"]);
            if ($respEmail == 0 || $respSenha == 0) { //tentativa de ataque injection
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
            require_once "../model/Ferramentas.php";
            $senhaHash = hash256($_REQUEST["senha"]);

            require_once "../model/Manager.php";
            $dados = dadosFuncionario($_REQUEST["email"], $senhaHash);

            if ($dados["result"] == 1) { //email e senha certa
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


            } else {
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
} else { //caso tenha sessão

    if (isset($_REQUEST["adm_new"])) {
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
        $dados["salario"] = $_REQUEST["salario"];
        $dados["perfil"] = $_REQUEST["perfil"];
        $dados["cargo"] = $_REQUEST["cargo"];
        require_once "../model/Manager.php";
        $resp = adicionarFuncionario($dados);

        if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
            ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD52">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        } else { //erro no insert
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

    if (isset($_REQUEST["adm_edit"])) {
        $dados["id"] = $_REQUEST["id"];
        $dados["nome"] = $_REQUEST["nome"];
        $dados["sexo"] = $_REQUEST["sexo"];
        $dados["email"] = $_REQUEST["email"];
        $dados["senha"] = "";
        $dados["senhaNova"] = "";
        if ($_REQUEST["senha"] != "") {
            require_once "../model/Ferramentas.php";
            $dados["senha"] = ($_REQUEST["senha"]);
            $dados["senhaNova"] = hash256($dados["senha"]);
        }
        $dados["telefone"] = $_REQUEST["telefone"];
        $dados["dataNascimento"] = $_REQUEST["dataNascimento"];
        $dados["cep"] = $_REQUEST["cep"];
        $dados["numero"] = $_REQUEST["numero"];
        $dados["complemento"] = $_REQUEST["complemento"];
        $dados["salario"] = $_REQUEST["salario"];
        $dados["cargo"] = $_REQUEST["cargo"];
        $dados["perfil"] = $_REQUEST["perfil"];
        $dados["foto"] = $_REQUEST["foto"];
        $dados["idFuncionario"] = $_REQUEST["idFuncionario"];
        require_once "../model/Manager.php";
        $resp = editarFuncionario($dados);

        if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD53">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        } else { //erro no insert
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD03">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        }
    }

    if (isset($_REQUEST["adm_delete"])) {
        $id = $_REQUEST["id"];
        require_once "../model/Manager.php";
        $result = excluirFuncionario($id);
        if ($result == 1) { //conseguir excluir
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        } else { //algo deu de errado na deleção
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD04">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        }
    }
}

// --------------------------------------------------------------Categorias---------------------------------------------//
if (isset($_REQUEST["categoria_new"])) {
    $categoria["nome"] = $_REQUEST["nome"];
    $categoria["comentario"] = $_REQUEST["comentario"];
    $categoria["imagem"] = $_REQUEST["imagem"];
    require_once "../model/Manager.php";
    $resp = adicionarCategoria($categoria);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
        ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD52">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD02">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["categoria_edit"])) {
    $categoria["id"] = $_REQUEST["id"];
    $categoria["nome"] = $_REQUEST["nome"];
    $categoria["comentario"] = $_REQUEST["comentario"];
    $categoria["imagem"] = $_REQUEST["imagem"];
    require_once "../model/Manager.php";
    $resp = editarCategoria($categoria);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["categoria_delete"])) {
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = excluirCategoria($id);
    if ($result == 1) { //conseguir excluir
    ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //algo deu de errado na deleção
    ?>
        <form action="../view/categoriaList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
        <?php
    }
}

// --------------------------------------------------------------Produtos---------------------------------------------//



if (isset($_REQUEST["produto_new"])) {
    $produto["nome"] = $_REQUEST["nome"];
    $produto["descricao"] = $_REQUEST["descricao"];
    $produto["estoque"] = $_REQUEST["estoque"];
    $produto["estoque_Min"] = $_REQUEST["estoque_Min"];
    $produto["estoque_Max"] = $_REQUEST["estoque_Max"];
    $produto["valor"] = $_REQUEST["valor"];
    $produto["status"] = $_REQUEST["status"];
    $produto["imagem"] = $_REQUEST["imagem"];
    $produto["categoria"] = $_REQUEST["categoria"];
    $produto["codigo"] = $_REQUEST["codigo"];

    require_once "../model/Produto.class.php";
    $codigo = new Produto;
    $dados = $codigo->codigoProdutos();

    for ($i = 0; $i < count($dados); $i++) {
        if ($dados[$i]["Cod_Produto"] == $produto["codigo"]) {
        ?>
            <form action="../view/produtoList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR26">
            </form>
            <script>
                document.getElementById('myForm').submit()
            </script>
        <?php
        }
    }
    require_once "../model/Manager.php";
    $resp = adicionarProduto($produto);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
        ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD52">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD02">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_POST["PesquisaProd"])) {
    $campo = $_REQUEST["buscar"];    
        require_once "../model/Manager.php";
        $result = listarProduto($campo);
    ?>

    <script>console.log('teste');</script>
    
    <?php

}

if (isset($_REQUEST["produto_edit"])) {
    $produto["id"] = $_REQUEST["id"];
    $produto["nome"] = $_REQUEST["nome"];
    $produto["codigo"] = $_REQUEST["codigo"];
    $produto["descricao"] = $_REQUEST["descricao"];
    $produto["estoque"] = $_REQUEST["estoque"];
    $produto["estoque_Min"] = $_REQUEST["estoque_Min"];
    $produto["estoque_Max"] = $_REQUEST["estoque_Max"];
    $produto["valor"] = $_REQUEST["valor"];
    $produto["status"] = $_REQUEST["status"];
    $produto["imagem"] = $_REQUEST["imagem"];
    $produto["categoria"] = $_REQUEST["categoria"];
    require_once "../model/Manager.php";
    $resp = editarProduto($produto);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["produto_delete"])) {
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = excluirProduto($id);
    if ($result == 1) { //conseguir excluir
    ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //algo deu de errado na deleção
    ?>
        <form action="../view/produtoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}


// --------------------------------------------------------------EMPRESA---------------------------------------------//

if (isset($_REQUEST["empresa_edit"])) {
    $empresa["id"] = $_REQUEST["id"];
    $empresa["nome"] = $_REQUEST["nome"];
    $empresa["fantasia"] = $_REQUEST["fantasia"];
    $empresa["cnpj"] = $_REQUEST["cnpj"];
    $empresa["ie"] = $_REQUEST["ie"];
    $empresa["cep"] = $_REQUEST["cep"];
    $empresa["endereco"] = $_REQUEST["endereco"];
    $empresa["numero"] = $_REQUEST["numero"];
    $empresa["bairro"] = $_REQUEST["bairro"];
    $empresa["cidade"] = $_REQUEST["cidade"];
    $empresa["uf"] = $_REQUEST["uf"];
    $empresa["telefone"] = $_REQUEST["telefone"];
    $empresa["site"] = $_REQUEST["site"];
    $empresa["data"] = $_REQUEST["data"];
    $empresa["logo"] = $_REQUEST["logo"];
    require_once "../model/Manager.php";
    $resp = editarEmpresa($empresa);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/empresaEdit2.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/empresaEdit2.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

//----------------------------------------------------ENTREGADOR------------------------------------------------//

if (isset($_REQUEST["entregador_new"])) {
    $entregador["nome"] = $_REQUEST["nome"];
    $entregador["sexo"] = $_REQUEST["sexo"];
    $entregador["email"] = $_REQUEST["email"];
    require_once "../model/Ferramentas.php";
    $entregador["senha"] = hash256($_REQUEST["senha"]);
    $entregador["telefone"] = $_REQUEST["telefone"];
    $entregador["dataNascimento"] = $_REQUEST["dataNascimento"];
    $entregador["cep"] = $_REQUEST["cep"];
    $entregador["numero"] = $_REQUEST["numero"];
    $entregador["complemento"] = $_REQUEST["complemento"];
    $entregador["foto"] = $_REQUEST["foto"];
    $entregador["veiculo"] = $_REQUEST["veiculo"];
    $entregador["identificacao"] = $_REQUEST["identificacao"];

    require_once "../model/Manager.php";
    $resp = adicionarEntregador($entregador);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD52">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD02">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["entregador_edit"])) {
    $entregador["id"] = $_REQUEST["id"];
    $entregador["nome"] = $_REQUEST["nome"];
    $entregador["sexo"] = $_REQUEST["sexo"];
    $entregador["email"] = $_REQUEST["email"];
    $entregador["senha"] = "";
    $entregador["senhaNova"] = "";
    if ($_REQUEST["senha"] != "") {
        require_once "../model/Ferramentas.php";
        $entregador["senha"] = ($_REQUEST["senha"]);
        $entregador["senhaNova"] = hash256($entregador["senha"]);
    }
    $entregador["telefone"] = $_REQUEST["telefone"];
    $entregador["dataNascimento"] = $_REQUEST["dataNascimento"];
    $entregador["cep"] = $_REQUEST["cep"];
    $entregador["numero"] = $_REQUEST["numero"];
    $entregador["complemento"] = $_REQUEST["complemento"];
    $entregador["veiculo"] = $_REQUEST["veiculo"];
    $entregador["identificacao"] = $_REQUEST["identificacao"];
    $entregador["foto"] = $_REQUEST["foto"];
    $entregador["idEntregador"] = $_REQUEST["idEntregador"];
    require_once "../model/Manager.php";
    $resp = editarEntregador($entregador);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["entregador_delete"])) {
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = excluirEntregador($id);
    if ($result == 1) { //conseguir excluir
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //algo deu de errado na deleção
    ?>
        <form action="../view/entregadorList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
<?php
    }
}


// ----------------------------------------Cargo----------------------------------------------------------//

if (isset($_REQUEST["cargo_new"])) {
    $cargo["nome"] = $_REQUEST["nome"];
    require_once "../model/Manager.php";
    $resp = adicionarCargo($cargo);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
        ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD52">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD02">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}


if (isset($_REQUEST["cargo_edit"])) {
    $cargo["id"] = $_REQUEST["id"];
    $cargo["nome"] = $_REQUEST["nome"];
    require_once "../model/Manager.php";
    $resp = editarCargo($cargo);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

if (isset($_REQUEST["cargo_delete"])) {
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = excluirCargo($id);
    if ($result == 1) { //conseguir excluir
    ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD54">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //algo deu de errado na deleção
    ?>
        <form action="../view/cargoList.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
        <?php
    }
}

// ---------------------------------------------------------CONFIGURAÇÃO-------------------------------------------------------------//

if (isset($_REQUEST["config_edit"])) {
    $config["id"] = $_REQUEST["id"];
    $config["data"] = $_REQUEST["data"];
    $config["abre"] = $_REQUEST["abre"];
    $config["fecha"] = $_REQUEST["fecha"];
    $config["pedido"] = $_REQUEST["pedido"];
    $config["mensagem"] = $_REQUEST["mensagem"];
    require_once "../model/Manager.php";
    $resp = atualizarConfig($config);

    if ($resp == 1) { //tudo certo ao adicionar um novo funcionario
    ?>
        <form action="../view/configEdit2.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD53">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    } else { //erro no insert
    ?>
        <form action="../view/configEdit2.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="BD03">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
    }
}

?>