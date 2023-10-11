<?php 

    function adicionarCliente($cliente){
    
    require_once "adm/model/Conexao.php";
    $sql = "INSERT INTO usuario (Senha, Email) VALUES ('{$cliente["senha"]}','{$cliente["email"]}')";
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





?>