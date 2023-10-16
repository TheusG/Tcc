<?php 

    function adicionarCliente($cliente){
    
    require_once "../adm/model/Conexao.php";
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


    function todosEmails(){
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
                $verifEmail[$i]["Id_Usuario"] = $row["Id_Usuario"];
                $verifEmail[$i]["Email"] = $row["Email"];
                $verifEmail[$i]["Usuario"] = $row["Usuario"];
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





?>