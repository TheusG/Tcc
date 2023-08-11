<?php 

//pegando os dados do usuario
function dadosFuncionario($email, $senha){
    require_once "Conexao.php";
    $sql = "SELECT * FROM usuario WHERE Email ='$email' AND Senha = '$senha'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        //$dados pega as informaçoes vinda o comando sql
        $dados = array();
        $dados["result"] = 1;// 1 tem dados 0 não tem dados
        while($row = $result->fetch_assoc()){
            $dados["Id_Usuario"] = $row["Id_Usuario"];
            $dados["Nome_Usuario"] =$row["Nome_Usuario"];
            $dados["Senha"] = $row["Senha"];
            $dados["Email"] = $row["Email"];

        }
        $conn->close();
        return $dados;//retorna dados pro controller
        
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }


}

?>