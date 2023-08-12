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
    $sql = "INSERT INTO usuario (Nome_Usuario,Senha, Sexo,Cep Numero, Complemento,Telefone, Email,Nascimento,Foto) VALUES ('{$dados["nome"]}', '{$dados["senha"]}','{$dados["sexo"]}','{$dados["cep"]}',{$dados["numero"]},'{$dados["complemento"]}','{$dados["telefone"]}','{$dados["email"]}',{$dados["dataNascimento"]},'{$dados["foto"]}')";
    $result = $conn->query($sql);

    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }

}   

?>