<?php 

//pegando os dados do usuario
function dadosFuncionario($Email, $Senha){
    require_once "Conexao.php";
    $sql = "SELECT * FROM usuario WHERE Email ='$Email' AND Senha = '$Senha'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        //$dados pega as informaçoes vinda o comando sql
        $dados = array();
        $dados["result"] = 1;// 1 tem dados 0 não tem dados
        while($row = $result->fetch_assoc()){
            $dados["Id_Usuario"] = $dados["Id_Usuario"];
            $dados["Nome_Usuario"] = $dados["Nome_Usuario"];
            $dados["Senha"] = $dados["Senha"];
            $dados["Sexo"] = $dados["Sexo"];
            $dados["Nascimento"] = $dados["Nascimento"];
        }
        $conn->close();
        
    }


}

?>