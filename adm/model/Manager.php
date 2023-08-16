<?php 

//pegando os dados do usuario
function dadosFuncionario($email, $senha){
    require_once "Conexao.php";

    $sql = "SELECT * FROM usuario WHERE Email ='$email' AND Senha = '$senha'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        //$dados pega as informaçoes vinda o comando sql
        require_once "Conexao.php";
        //  $sql = "SELECT f.Cargo from funcionario f join usuario u on u.Id_Usuario = f.Usuario";
        // $result = $conn->query($sql);

        //VERIFICAR ISSO
        // $sql = "SELECT f.Cargo c.Nome_Cargo, c.Id_Cargo, u.Id_Usuario from cargo c join funcionario f on f.Cargo = c.Id_Cargo join usuario u on u.Id_Usuario = f.Usuario";
        // $result = $conn->query($sql);
        
        
        $dados = array();
        $dados["result"] = 1;// 1 tem dados 0 não tem dados
        while($row = $result->fetch_assoc()){
            $dados["Id_Usuario"] = $row["Id_Usuario"];
            $dados["Nome_Usuario"] =$row["Nome_Usuario"];
            $dados["Senha"] = $row["Senha"];
            $dados["Email"] = $row["Email"];
            $dados["Cargo"] = $row["Cargo"];
            $dados["Nome_Cargo"]  = $row["Nome_Cargo"];
        }
        $conn->close();
        return $dados;//retorna dados pro controller
        
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }


}

function listarFuncionario(){
    require_once "Conexao.php";
    $sql = "SELECT * FROM usuario";
    $result= $conn->query($sql);  

    if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i =1;
        while($row = $result->fetch_assoc()){
            $dados[$i]["Id_Usuario"] = $row["Id_Usuario"];
            $dados[$i]["Nome_Usuario"] =$row["Nome_Usuario"];
            $dados[$i]["Senha"] = $row["Senha"];
            $dados[$i]["Sexo"] = $row["Sexo"];
            $dados[$i]["Cep"] = $row["Cep"];
            $dados[$i]["Complemento"] = $row["Complemento"];
            $dados[$i]["Numero"] = $row["Numero"];
            $dados[$i]["Telefone"] = $row["Telefone"];
            $dados[$i]["Email"] = $row["Email"];
            $dados[$i]["Nascimento"] = $row["Nascimento"];

            $i++;
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function adicionarFuncionario($dados){
    require_once "Conexao.php";
    $sql = "INSERT INTO usuario (Nome_Usuario,Senha, Sexo,Cep, Numero, Complemento,Telefone, Email,Nascimento,Foto) VALUES ('{$dados["nome"]}', '{$dados["senha"]}','{$dados["sexo"]}','{$dados["cep"]}','{$dados["numero"]}','{$dados["complemento"]}','{$dados["telefone"]}','{$dados["email"]}','{$dados["dataNascimento"]}','{$dados["foto"]}')";
    $result = $conn->query($sql);

    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }

}   

function pegaFuncionario($id){
    require_once "Conexao.php";
    $sql = "SELECT * FROM usuario WHERE Id_Usuario = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["Id_Usuario"] = $row["Id_Usuario"];
            $dados["Nome_Usuario"] = $row["Nome_Usuario"];
            $dados["Sexo"] = $row["Sexo"];
            $dados["Cep"] = $row["Cep"];
            $dados["Numero"] = $row["Numero"];
            $dados["Complemento"] = $row["Complemento"];
            $dados["Telefone"] = $row["Telefone"];
            $dados["Email"] = $row["Email"];
            $dados["Nascimento"] = $row["Nascimento"];
            $dados["Foto"] = $row["Foto"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function editarFuncionario($dados){
    require_once "Conexao.php";
    $sql = "";
    if(!isset($dados["senha"]) || $dados["senha"] == ""){
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}',Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
    }else{
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Senha = '{$dados["senha"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}',Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
    }
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function excluirFuncionario($id){
    require_once "Conexao.php";
    $sql = "DELETE FROM usuario WHERE Id_Usuario = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

?>