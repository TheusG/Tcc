<?php

function dadosCliente($email, $senha)
{
    require_once "../adm/model/Conexao.php";
    $sql = "SELECT usuario.* , cliente.*,cep.* 
    FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario
    INNER JOIN Cep on usuario.Cep = cep.Id_Cep WHERE usuario.Email = '$email' AND usuario.Senha = '$senha'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        require_once "../adm/model/Conexao.php";
        $cliente = array();
        $cliente["result"] = 1; // 1 tem dados 0 não tem dados
        while ($row = $result->fetch_assoc()) {
            $cliente["Id_Usuario"] = $row["Id_Usuario"];
            $cliente["Nome_Usuario"] = $row["Nome_Usuario"];
            $cliente["Senha"] = $row["Senha"];
            $cliente["Email"] = $row["Email"];
            $cliente["Telefone"] = $row["Telefone"];
            $cliente["Numero"] = $row["Numero"];
            $cliente["Complemento"] = $row["Complemento"];
            $cliente["Id_Cliente"] = $row["Id_Cliente"];
            $cliente["Id_Cep"] = $row["Id_Cep"];
            $cliente["Cidade"] = $row["Cidade"];
            $cliente["Logradouro"] = $row["Tipo"];
            $cliente["Bairro"] = $row["Bairro"];
            $cliente["Cep"] = $row["Cep"];
            $cliente["Cep2"] = $row["Cep"];
        }
        $conn->close();
        return $cliente;
    } else {
        $cliente["result"] = 0;
        $conn->close();
        return $cliente;
    }
}

function adicionarCliente($cliente)
{

    require_once "../adm/model/Conexao.php";
    $sql = "INSERT INTO usuario (Senha,Cep, Email) VALUES ('{$cliente["senha"]}',69690,'{$cliente["email"]}')";
    $result = $conn->query($sql);
    $ultimoid = mysqli_insert_id($conn);

    if ($result == true) { //tudo certo
        $sql = "INSERT INTO cliente (Usuario) VALUES ($ultimoid)";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return 1;
        } else {
            return 0;
        }
    } else {
        $conn->close();
        return 0;
    }
}


function todosEmails()
{
    require_once "../adm/model/Conexao.php";
    $sql = "SELECT usuario.Email FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $verifEmail = array();
        $verifEmail["result"] = 1;
        $verifEmail["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {

            $verifEmail[$i]["Email"] = $row["Email"];

            $i++;
        }
        $conn->close();
        return $verifEmail;
    } else {
        $verifEmail["result"] = 0;
        $conn->close();
        return $verifEmail;
    }
}

function adicionarCarrinho($id, $Valor, $quantidade, $subTotal, $cliente)
{
    require_once "../adm/model/Conexao.php";

    if ($quantidade == 1) {
        $sql = "INSERT INTO carrinho(Cliente,Cod_Produto,Quantidade,Valor_Unitario,SubTotal,Total,Desconto,Adicional,Pagamento) VALUES('{$cliente}','{$id}','{$quantidade}','{$Valor}','{$subTotal}','{$subTotal}',0,0,1)";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return 1;
        } else {
            $conn->close();
            return 0;
        }
    } else {
        $sql = "UPDATE carrinho SET Quantidade = '{$quantidade}', SubTotal = '{$subTotal}',Total = '{$subTotal}' WHERE Cod_Produto = '{$id}' AND Cliente = '{$cliente}'";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return 1;
        } else {
            $conn->close();
            return 0;
        }
    }
}



function itemDelete($id, $cliente)
{

    require_once "../adm/model/Conexao.php";
    $sql = "DELETE FROM carrinho WHERE Cod_Produto = {$id} AND Cliente = '{$cliente}'";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function formasPagamento()
{

    require_once "../adm/model/Conexao.php";
    $sql = "SELECT * FROM pagamento";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $pagamento = array();
        $pagamento["result"] = 1;
        $pagamento["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $pagamento[$i]["Id_Pagamento"] = $row["Id_Pagamento"];
            $pagamento[$i]["Nome_Pagamento"] = $row["Nome_Pagamento"];
            $i++;
        }
        $conn->close();
        return $pagamento;
    } else {
        $pagamento["result"] = 0;
        $conn->close();
        return $pagamento;
    }
}


function atualizarCliente($cliente)
{
    require_once "../adm/model/Conexao.php";
    $sql = "UPDATE usuario SET Nome_Usuario = '{$cliente["nome"]}', Cep = '{$cliente["cep"]}', Complemento = '{$cliente["complemento"]}', Telefone ='{$cliente["telefone"]}',  Numero = '{$cliente["numero"]}', Email = '{$cliente["email"]}' WHERE Id_Usuario = '{$cliente["id"]}'";
    $result = $conn->query($sql);

    if ($result == true) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}



function adicionarVenda($venda, $carrinho, $pedido, $cliente, $infoCliente)
{

    require_once "../adm/model/Conexao.php";
    $sql = "UPDATE usuario SET Nome_Usuario = '{$infoCliente["nome"]}', Telefone = '{$infoCliente["telefone"]}' WHERE Id_Usuario = '{$infoCliente["usuario"]}'";
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "INSERT INTO venda (Nro_Venda,Cliente, Data_Venda,Entregador, Status, Valor_Venda, Desconto_Venda,Adicional_Venda,Pagamento) VALUES ('{$pedido}','{$cliente}',now(),'{$venda["entrega"]}',1,'{$venda["total"]}',0,0,'{$venda["pagamento"]}')";
        $result = $conn->query($sql);
        $ultimoid = mysqli_insert_id($conn);

        if ($result == true) {
            //------------------------------------------DETALHE VENDA----------------------------------
            for ($i = 0; $i < count($carrinho); $i++) {
                $sql = "INSERT INTO detalhe_venda (Id_Venda, Nro_Venda, Cod_Produto, Quantidade, Val_Unitario, Val_Total) VALUES ('{$ultimoid}', '{$pedido}', '{$carrinho[$i]["Cod_Produto"]}', '{$carrinho[$i]["Quantidade"]}', '{$carrinho[$i]["Valor_Unitario"]}', '{$carrinho[$i]["SubTotal"]}')";
                $result = $conn->query($sql);
            }
            //-------------------------------------------CARRINHO--------------------------------------
            if ($result == true) {
                $sql = "DELETE FROM carrinho WHERE cliente = '{$cliente}'";
                $result = $conn->query($sql);

                // -------------------------------------------CONFIGURACAO-----------------------------------            
                if ($result == true) {
                    $sql = "UPDATE configuracao SET NrPedido = '{$pedido}'";
                    $result = $conn->query($sql);

                    if ($result == true) {
                        $conn->close();
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return 0;
                }
            } else {
                $conn->close();
                return 0;
            }
        } else {
            $conn->close();
            return 0;
        }
    } else {
        $conn->close();
        return 0;
    }
}

function confirmaCompraCep($cliente, $numero, $complemento, $venda, $infoCliente, $pedido,$carrinho)
{

    require_once "../adm/model/Conexao.php";
    $sql = "UPDATE usuario SET Nome_Usuario = '{$infoCliente["nome"]}', Telefone = '{$infoCliente["telefone"]}', Cep = '{$cliente["cep"]}' , Numero = '{$numero}', Complemento = '{$complemento}' WHERE Id_Usuario = '{$infoCliente["usuario"]}'";
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "INSERT INTO venda (Nro_Venda,Cliente, Data_Venda,Entregador, Status, Valor_Venda, Desconto_Venda,Adicional_Venda,Pagamento) VALUES ('{$pedido}','{$infoCliente["id"]}',now(),'{$venda["entrega"]}',1,'{$venda["total"]}',0,0,'{$venda["pagamento"]}')";
        $result = $conn->query($sql);
        $ultimoid = mysqli_insert_id($conn);

        if ($result == true) {
            //------------------------------------------DETALHE VENDA----------------------------------
            for ($i = 0; $i < count($carrinho); $i++) {
                $sql = "INSERT INTO detalhe_venda (Id_Venda, Nro_Venda, Cod_Produto, Quantidade, Val_Unitario, Val_Total) VALUES ('{$ultimoid}', '{$pedido}', '{$carrinho[$i]["Cod_Produto"]}', '{$carrinho[$i]["Quantidade"]}', '{$carrinho[$i]["Valor_Unitario"]}', '{$carrinho[$i]["SubTotal"]}')";
                $result = $conn->query($sql);
            }

            if ($result == true) {
                $sql = "DELETE FROM carrinho WHERE cliente = '{$infoCliente["id"]}'";
                $result = $conn->query($sql);

                // -------------------------------------------CONFIGURACAO-----------------------------------            
                if ($result == true) {
                    $sql = "UPDATE configuracao SET NrPedido = '{$pedido}'";
                    $result = $conn->query($sql);

                    if ($result == true) {
                        $conn->close();
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return 0;
                }
            } else {
                $conn->close();
                return 0;
            }
        } else {
            $conn->close();
            return 0;
        }
    } else {
        $conn->close();
        return 0;
    }
}
