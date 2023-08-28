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

    if($dados["senhaNova"] == "" && $dados["foto"] == ""){
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}' WHERE Id_Usuario = {$dados["id"]}";
    }
    else if($dados["senhaNova"] == "" && $dados["foto"] != ""){
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}', Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
    } 
    else if($dados["senhaNova"] != "" && $dados["foto"] == ""){
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Senha = '{$dados["senhaNova"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}' WHERE Id_Usuario = {$dados["id"]}";
    }else{
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Senha = '{$dados["senhaNova"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}', Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
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


// --------------------------------------------------------------Categorias---------------------------------
function listarCategorias(){
    require_once "Conexao.php";
    $sql = "SELECT * FROM categoria";
    $result= $conn->query($sql);  

    if($result->num_rows > 0){
        $num = $result->num_rows;
        $categoria = array();
        $categoria["result"] = 1;
        $categoria["num"] = $num;
        $i =1;
        while($row = $result->fetch_assoc()){
            $categoria[$i]["Id_Categoria"] = $row["Id_Categoria"];
            $categoria[$i]["Nome_Categoria"] =$row["Nome_Categoria"];
            $categoria[$i]["Comentario"] = $row["Comentario"];
            $categoria[$i]["Imagem"] = $row["Imagem"];
            $i++;
        }
        $conn->close();
        return $categoria;
    }else{
        $categoria["result"] = 0;
        $conn->close();
        return $categoria;
    }
}

function adicionarCategoria($categoria){
    require_once "Conexao.php";
    $sql = "INSERT INTO categoria (Nome_Categoria,Comentario,Imagem) VALUES ('{$categoria["nome"]}', '{$categoria["comentario"]}','{$categoria["imagem"]}')";
    $result = $conn->query($sql);

    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }

}


function pegaCategoria($id){
    require_once "Conexao.php";
    $sql = "SELECT * FROM categoria WHERE Id_Categoria = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if($result->num_rows > 0){
        $categoria = array();
        $categoria["result"] = 1;
        while($row = $result->fetch_assoc()){
            $categoria["Id_Categoria"] = $row["Id_Categoria"];
            $categoria["Nome_Categoria"] = $row["Nome_Categoria"];
            $categoria["Comentario"] = $row["Comentario"];
            $categoria["Imagem"] = $row["Imagem"];
            
        }
        $conn->close();
        return $categoria;
    }else{
        $categoria["result"] = 0;
        $conn->close();
        return $categoria;
    }
}

function editarCategoria($categoria){
    require_once "Conexao.php";
        if($categoria["imagem"] == ""){
            $sql = "UPDATE categoria SET Nome_Categoria = '{$categoria["nome"]}', Comentario = '{$categoria["comentario"]}' WHERE Id_Categoria = {$categoria["id"]}";
        }else{
            $sql = "UPDATE categoria SET Nome_Categoria = '{$categoria["nome"]}', Comentario = '{$categoria["comentario"]}', Imagem = '{$categoria["imagem"]}' WHERE Id_Categoria = {$categoria["id"]}";
        }
        
        $result = $conn->query($sql);
        if($result == true){//tudo certo 
            $conn->close();
                return 1;
        }else{
            $conn->close();
            return 0;
        }
}

function excluirCategoria($id){
    require_once "Conexao.php";
    $sql = "DELETE FROM categoria WHERE Id_Categoria = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

//---------------------------------------------PRODUTO----------------------------------------------------------//

function listarProduto(){
    require_once "Conexao.php";
    $sql = "SELECT * FROM produto";
    $result= $conn->query($sql);  

    if($result->num_rows > 0){
        $num = $result->num_rows;
        $produto = array();
        $produto["result"] = 1;
        $produto["num"] = $num;
        $i =1;
        while($row = $result->fetch_assoc()){
            $produto[$i]["Id_Produto"] = $row["Id_Produto"];
            $produto[$i]["Cod_Produto"] =$row["Cod_Produto"];
            $produto[$i]["Nome_Produto"] = $row["Nome_Produto"];
            $produto[$i]["Desc_Produto"] = $row["Desc_Produto"];
            $produto[$i]["Estoque"] = $row["Estoque"];
            $produto[$i]["Estoque_Min"] =$row["Estoque_Min"];
            $produto[$i]["Estoque_Max"] = $row["Estoque_Max"];
            $produto[$i]["Valor"] = $row["Valor"];
            $produto[$i]["Status_Produto"] = $row["Status_Produto"];
            $produto[$i]["Imagem"] = $row["Imagem"];
            $produto[$i]["Categoria"] = $row["Categoria"];
            $i++;
        }
        $conn->close();
        return $produto;
    }else{
        $produto["result"] = 0;
        $conn->close();
        return $produto;
    }
}

function adicionarProduto($produto){
    require_once "Conexao.php";
    $sql = "INSERT INTO produto (Cod_Produto,Nome_Produto,Desc_Produto,Estoque,Estoque_Min,Estoque_Max,Valor,Status_Produto,Imagem,Categoria) VALUES ('{$produto["codigo"]}', '{$produto["nome"]}','{$produto["descricao"]}','{$produto["estoque"]}','{$produto["estoque_Min"]}','{$produto["estoque_Max"]}','{$produto["valor"]}','{$produto["status"]}','{$produto["imagem"]}','{$produto["categoria"]}')";
    $result = $conn->query($sql);

    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }

}

function pegaProduto($id){
    require_once "Conexao.php";
    $sql = "SELECT * FROM produto WHERE Id_Produto = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if($result->num_rows > 0){
        $produto = array();
        $produto["result"] = 1;
        while($row = $result->fetch_assoc()){
            $produto["Id_Produto"] = $row["Id_Produto"];
            $produto["Cod_Produto"] =$row["Cod_Produto"];
            $produto["Nome_Produto"] = $row["Nome_Produto"];
            $produto["Desc_Produto"] = $row["Desc_Produto"];
            $produto["Estoque"] = $row["Estoque"];
            $produto["Estoque_Min"] =$row["Estoque_Min"];
            $produto["Estoque_Max"] = $row["Estoque_Max"];
            $produto["Valor"] = $row["Valor"];
            $produto["Status_Produto"] = $row["Status_Produto"];
            $produto["Imagem"] = $row["Imagem"];
            $produto["Categoria"] = $row["Categoria"];
            
        }
        $conn->close();
        return $produto;
    }else{
        $produto["result"] = 0;
        $conn->close();
        return $produto;
    }
}

function editarProduto($produto){
    require_once "Conexao.php";
        if($produto["imagem"] == ""){
            $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' , Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";
        }else{
            $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' ,Imagem = '{$produto["imagem"]}', Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";        
        }
        
        $result = $conn->query($sql);
        if($result == true){//tudo certo 
            $conn->close();
                return 1;
        }else{
            $conn->close();
            return 0;
        }
}

function excluirProduto($id){
    require_once "Conexao.php";
    $sql = "DELETE FROM produto WHERE Id_Produto = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}









?>