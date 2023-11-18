<?php 

function dadosCliente($email, $senha)
{
    require_once "../adm/model/Conexao.php";
    // $sql = "SELECT usuario.* , cliente.*
    //         FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario
    //         WHERE usuario.Email = '$email' AND usuario.Senha = '$senha'";
    $sql = "SELECT usuario.* , cliente.*,cep.* 
            FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario
            INNER JOIN Cep on usuario.Cep = Cep.id WHERE usuario.Email = '$email' AND usuario.Senha = '$senha'";
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
            $cliente["Id"] = $row["Id"];
            $cliente["Bairro"] = $row["Bairro"];
            $cliente["Logradouro"] = $row["Logradouro"];
            $cliente["Cidade"] = $row["Cidade"];
            $cliente["Numero"] = $row["Numero"];
            $cliente["Complemento"] = $row["Complemento"];
            $cliente["Id_Cliente"] = $row["Id_Cliente"];
           
        }
        $conn->close();
        return $cliente;
    } else {
        $cliente["result"] = 0;
        $conn->close();
        return $cliente;
    }
}

    function adicionarCliente($cliente){
    
    require_once "../adm/model/Conexao.php";
    $sql = "INSERT INTO usuario (Senha,Cep, Email) VALUES ('{$cliente["senha"]}',2,'{$cliente["email"]}')";
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





?>