<?php

//pegando os dados do usuario
function dadosFuncionario($email, $senha)
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , funcionario.*
            FROM usuario INNER JOIN funcionario on usuario.Id_Usuario = funcionario.Usuario
            WHERE usuario.Email = '$email' AND usuario.Senha = '$senha'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        require_once "Conexao.php";
        $dados = array();
        $dados["result"] = 1; // 1 tem dados 0 não tem dados
        while ($row = $result->fetch_assoc()) {
            $dados["Id_Usuario"] = $row["Id_Usuario"];
            $dados["Nome_Usuario"] = $row["Nome_Usuario"];
            $dados["Senha"] = $row["Senha"];
            $dados["Email"] = $row["Email"];
            $dados["Perfil"] = $row["Perfil"];
        }
        $conn->close();
        return $dados;
    } else {
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function listarFuncionario()
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , funcionario.* FROM usuario INNER JOIN funcionario on usuario.Id_Usuario = funcionario.Usuario";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $dados[$i]["Id_Usuario"] = $row["Id_Usuario"];
            $dados[$i]["Nome_Usuario"] = $row["Nome_Usuario"];
            $dados[$i]["Senha"] = $row["Senha"];
            $dados[$i]["Sexo"] = $row["Sexo"];
            $dados[$i]["Cep"] = $row["Cep"];
            $dados[$i]["Complemento"] = $row["Complemento"];
            $dados[$i]["Numero"] = $row["Numero"];
            $dados[$i]["Telefone"] = $row["Telefone"];
            $dados[$i]["Email"] = $row["Email"];
            $dados[$i]["Nascimento"] = $row["Nascimento"];
            $dados[$i]["Cargo"] = $row["Cargo"];
            $dados[$i]["Perfil"] = $row["Perfil"];
            $dados[$i]["Salario"] = $row["Salario"];
            $dados[$i]["Usuario"] = $row["Usuario"];
            $i++;
        }
        $conn->close();
        return $dados;
    } else {
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function adicionarFuncionario($dados)
{
    require_once "Conexao.php";
    $sql = "INSERT INTO usuario (Nome_Usuario,Senha, Sexo,Cep, Numero, Complemento,Telefone, Email,Nascimento,Foto) VALUES ('{$dados["nome"]}', '{$dados["senha"]}','{$dados["sexo"]}','{$dados["cep"]}','{$dados["numero"]}','{$dados["complemento"]}','{$dados["telefone"]}','{$dados["email"]}','{$dados["dataNascimento"]}','{$dados["foto"]}')";
    $result = $conn->query($sql);
    $ultimoid = mysqli_insert_id($conn);

    if ($result == true) { //tudo certo
        $sql = "INSERT INTO funcionario (Cargo,Perfil,Salario,Usuario) VALUES ('{$dados["cargo"]}','{$dados["perfil"]}','{$dados["salario"]}',$ultimoid)";
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

function pegaFuncionario($id)
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , funcionario.*,cep.* 
    FROM usuario INNER JOIN funcionario on usuario.Id_Usuario = funcionario.Usuario
    INNER JOIN Cep on usuario.Cep = cep.Id_Cep WHERE usuario.Id_Usuario = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $dados = array();
        $dados["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $dados["Id_Usuario"] = $row["Id_Usuario"];
            $dados["Nome_Usuario"] = $row["Nome_Usuario"];
            $dados["Sexo"] = $row["Sexo"];
            $dados["Numero"] = $row["Numero"];
            $dados["Complemento"] = $row["Complemento"];
            $dados["Telefone"] = $row["Telefone"];
            $dados["Email"] = $row["Email"];
            $dados["Nascimento"] = $row["Nascimento"];
            $dados["Foto"] = $row["Foto"];
            $dados["Cargo"] = $row["Cargo"];
            $dados["Perfil"] = $row["Perfil"];
            $dados["Salario"] = $row["Salario"];
            $dados["Usuario"] = $row["Usuario"];
            $dados["Id_Cep"] = $row["Id_Cep"];
            $dados["Cidade"] = $row["Cidade"];
            $dados["Logradouro"] = $row["Logradouro"];
            $dados["Bairro"] = $row["Bairro"];
            $dados["Cep"] = $row["Cep"];
            $dados["Tipo"] = $row["Tipo"];
           
        }
        $conn->close();
        return $dados;
    } else {
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function editarFuncionario($dados)
{
    require_once "Conexao.php";
    if ($dados["senhaNova"] == "" && $dados["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}' WHERE Id_Usuario = {$dados["id"]}";
    } else if ($dados["senhaNova"] == "" && $dados["foto"] != "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}', Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
    } else if ($dados["senhaNova"] != "" && $dados["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Senha = '{$dados["senhaNova"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}' WHERE Id_Usuario = {$dados["id"]}";
    } else {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$dados["nome"]}', Senha = '{$dados["senhaNova"]}', Sexo = '{$dados["sexo"]}', Cep = '{$dados["cep"]}', Numero = '{$dados["numero"]}',Complemento = '{$dados["complemento"]}', Telefone = '{$dados["telefone"]}', Email = '{$dados["email"]}', Nascimento = '{$dados["dataNascimento"]}', Foto = '{$dados["foto"]}' WHERE Id_Usuario = {$dados["id"]}";
    }
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "UPDATE funcionario SET Cargo = '{$dados["cargo"]}', Perfil = '{$dados["perfil"]}', Salario = '{$dados["salario"]}' WHERE Usuario = {$dados["idFuncionario"]}";
        $result = $conn->query($sql);
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirFuncionario($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM funcionario WHERE Usuario = {$id}";
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "DELETE FROM usuario WHERE Id_Usuario = {$id}";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return $result;
        } else {
            $conn->close();
            return $result;
        }
    } else {
        $conn->close();
        return $result;
    }
}


// --------------------------------------------------------------Categorias---------------------------------
function listarCategorias()
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM categoria";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $categoria = array();
        $categoria["result"] = 1;
        $categoria["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $categoria[$i]["Id_Categoria"] = $row["Id_Categoria"];
            $categoria[$i]["Nome_Categoria"] = $row["Nome_Categoria"];
            $categoria[$i]["Comentario"] = $row["Comentario"];
            $categoria[$i]["Imagem"] = $row["Imagem"];
            $i++;
        }
        $conn->close();
        return $categoria;
    } else {
        $categoria["result"] = 0;
        $conn->close();
        return $categoria;
    }
}

function adicionarCategoria($categoria)
{
    require_once "Conexao.php";
    $sql = "INSERT INTO categoria (Nome_Categoria,Comentario,Imagem) VALUES ('{$categoria["nome"]}', '{$categoria["comentario"]}','{$categoria["imagem"]}')";
    $result = $conn->query($sql);

    if ($result == true) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}


function pegaCategoria($id)
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM categoria WHERE Id_Categoria = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $categoria = array();
        $categoria["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $categoria["Id_Categoria"] = $row["Id_Categoria"];
            $categoria["Nome_Categoria"] = $row["Nome_Categoria"];
            $categoria["Comentario"] = $row["Comentario"];
            $categoria["Imagem"] = $row["Imagem"];
        }
        $conn->close();
        return $categoria;
    } else {
        $categoria["result"] = 0;
        $conn->close();
        return $categoria;
    }
}

function editarCategoria($categoria)
{
    require_once "Conexao.php";
    if ($categoria["imagem"] == "") {
        $sql = "UPDATE categoria SET Nome_Categoria = '{$categoria["nome"]}', Comentario = '{$categoria["comentario"]}' WHERE Id_Categoria = {$categoria["id"]}";
    } else {
        $sql = "UPDATE categoria SET Nome_Categoria = '{$categoria["nome"]}', Comentario = '{$categoria["comentario"]}', Imagem = '{$categoria["imagem"]}' WHERE Id_Categoria = {$categoria["id"]}";
    }

    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirCategoria($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM produto WHERE Categoria = {$id}";
    $result = $conn->query($sql);

   if ($result == true) {
        $sql = "DELETE FROM categoria WHERE Id_Categoria = {$id}";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return $result;
        } else {
            $conn->close();
            return $result;
        }
    } else {
        $conn->close();
        return $result;
    }
}

function todasCategorias()
{
    require_once "Conexao.php";
    $sql = "SELECT  Id_Categoria , Nome_Categoria FROM categoria";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $categoria = array();
        $categoria["result"] = 1;
        $categoria["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $categoria[$i]["Id_Categoria"] = $row["Id_Categoria"];
            $categoria[$i]["Nome_Categoria"] = $row["Nome_Categoria"];
            $i++;
        }
        $conn->close();
        return $categoria;
    } else {
        $categoria["result"] = 0;
        $conn->close();
        return $categoria;
    }
}

//---------------------------------------------PRODUTO----------------------------------------------------------//

function listarProduto($campo)
{

    if ($campo == "") {
        require_once "Conexao.php";
        $sql = "SELECT * FROM produto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $num = $result->num_rows;
            $produto = array();
            $produto["result"] = 1;
            $produto["num"] = $num;
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $produto[$i]["Id_Produto"] = $row["Id_Produto"];
                $produto[$i]["Cod_Produto"] = $row["Cod_Produto"];
                $produto[$i]["Nome_Produto"] = $row["Nome_Produto"];
                $produto[$i]["Desc_Produto"] = $row["Desc_Produto"];
                $produto[$i]["Estoque"] = $row["Estoque"];
                $produto[$i]["Estoque_Min"] = $row["Estoque_Min"];
                $produto[$i]["Estoque_Max"] = $row["Estoque_Max"];
                $produto[$i]["Valor"] = $row["Valor"];
                $produto[$i]["Status_Produto"] = $row["Status_Produto"];
                $produto[$i]["Imagem"] = $row["Imagem"];
                $produto[$i]["Categoria"] = $row["Categoria"];
                $i++;
            }
            $conn->close();
            return $produto;
        } else {
            $produto["result"] = 0;
            $conn->close();
            return $produto;
        }
    } else {
        require_once "Conexao.php";
        $sql = "SELECT * FROM produto WHERE Cod_Produto LIKE '%$campo%' OR Nome_Produto LIKE '%$campo%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $num = $result->num_rows;
            $produto = array();
            $produto["result"] = 1;
            $produto["num"] = $num;
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $produto[$i]["Id_Produto"] = $row["Id_Produto"];
                $produto[$i]["Cod_Produto"] = $row["Cod_Produto"];
                $produto[$i]["Nome_Produto"] = $row["Nome_Produto"];
                $produto[$i]["Desc_Produto"] = $row["Desc_Produto"];
                $produto[$i]["Estoque"] = $row["Estoque"];
                $produto[$i]["Estoque_Min"] = $row["Estoque_Min"];
                $produto[$i]["Estoque_Max"] = $row["Estoque_Max"];
                $produto[$i]["Valor"] = $row["Valor"];
                $produto[$i]["Status_Produto"] = $row["Status_Produto"];
                $produto[$i]["Imagem"] = $row["Imagem"];
                $produto[$i]["Categoria"] = $row["Categoria"];
                $i++;
            }
            $conn->close();
            return $produto;
        } else {
            $produto["result"] = 0;
            $conn->close();
            return $produto;
        }
    }
}



function adicionarProduto($produto)
{
    require_once "Conexao.php";
    $sql = "INSERT INTO produto (Cod_Produto,Nome_Produto,Desc_Produto,Estoque,Estoque_Min,Estoque_Max,Valor,Status_Produto,Imagem,Categoria) VALUES ('{$produto["codigo"]}', '{$produto["nome"]}','{$produto["descricao"]}','{$produto["estoque"]}','{$produto["estoque_Min"]}','{$produto["estoque_Max"]}','{$produto["valor"]}','{$produto["status"]}','{$produto["imagem"]}','{$produto["categoria"]}')";
    $result = $conn->query($sql);

    if ($result == true) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function pegaProduto($id)
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM produto WHERE Id_Produto = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $produto = array();
        $produto["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $produto["Id_Produto"] = $row["Id_Produto"];
            $produto["Cod_Produto"] = $row["Cod_Produto"];
            $produto["Nome_Produto"] = $row["Nome_Produto"];
            $produto["Desc_Produto"] = $row["Desc_Produto"];
            $produto["Estoque"] = $row["Estoque"];
            $produto["Estoque_Min"] = $row["Estoque_Min"];
            $produto["Estoque_Max"] = $row["Estoque_Max"];
            $produto["Valor"] = $row["Valor"];
            $produto["Status_Produto"] = $row["Status_Produto"];
            $produto["Imagem"] = $row["Imagem"];
            $produto["Categoria"] = $row["Categoria"];
        }
        $conn->close();
        return $produto;
    } else {
        $produto["result"] = 0;
        $conn->close();
        return $produto;
    }
}

function puxarProduto($Cod_Produto)
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM produto WHERE Cod_Produto = {$Cod_Produto}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $produto = array();
        $produto["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $produto["Id_Produto"] = $row["Id_Produto"];
            $produto["Cod_Produto"] = $row["Cod_Produto"];
            $produto["Nome_Produto"] = $row["Nome_Produto"];
            $produto["Desc_Produto"] = $row["Desc_Produto"];
            $produto["Estoque"] = $row["Estoque"];
            $produto["Estoque_Min"] = $row["Estoque_Min"];
            $produto["Estoque_Max"] = $row["Estoque_Max"];
            $produto["Valor"] = $row["Valor"];
            $produto["Status_Produto"] = $row["Status_Produto"];
            $produto["Imagem"] = $row["Imagem"];
            $produto["Categoria"] = $row["Categoria"];
        }
        $conn->close();
        return $produto;
    } else {
        $produto["result"] = 0;
        $conn->close();
        return $produto;
    }
}

function editarProduto($produto)
{
    require_once "Conexao.php";
    if($produto["cod"] == 0){
        if ($produto["imagem"] == "") {
            $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' , Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";
        } else {
            $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' ,Imagem = '{$produto["imagem"]}', Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";
        }
    }
    if($produto["cod"] == 1){
        if ($produto["imagem"] == "") {
            $sql = "UPDATE produto SET  Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' , Categoria = '{$produto["categoria"]}' WHERE Cod_Produto = {$produto["codigo"]}";
        } else {
            $sql = "UPDATE produto SET  Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' ,Imagem = '{$produto["imagem"]}', Categoria = '{$produto["categoria"]}' WHERE Cod_Produto = {$produto["codigo"]}";
        }
    }

    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function editProduto($produto)
{
    require_once "Conexao.php";
    if ($produto["imagem"] == "") {
        $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' , Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";
    } else {
        $sql = "UPDATE produto SET Cod_Produto = '{$produto["codigo"]}', Nome_Produto = '{$produto["nome"]}', Desc_Produto = '{$produto["descricao"]}', Estoque = '{$produto["estoque"]}', Estoque_Min = '{$produto["estoque_Min"]}', Estoque_Max = '{$produto["estoque_Max"]}', Valor = '{$produto["valor"]}', Status_Produto = '{$produto["status"]}' ,Imagem = '{$produto["imagem"]}', Categoria = '{$produto["categoria"]}' WHERE Id_Produto = {$produto["id"]}";
    }

    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirProduto($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM produto WHERE Id_Produto = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}



// --------------------------------------------------------------EMPRESA---------------------------------------------//
function pegaEmpresa()
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM empresa";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $empresa = array();
        $empresa["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $empresa["Id_Empresa"] = $row["Id_Empresa"];
            $empresa["Nome_Empresa"] = $row["Nome_Empresa"];
            $empresa["Fantasia"] = $row["Fantasia"];
            $empresa["Cnpj"] = $row["Cnpj"];
            $empresa["Ie"] = $row["Ie"];
            $empresa["Cep"] = $row["Cep"];
            $empresa["Endereco"] = $row["Endereco"];
            $empresa["Numero"] = $row["Numero"];
            $empresa["Bairro"] = $row["Bairro"];
            $empresa["Cidade"] = $row["Cidade"];
            $empresa["Uf"] = $row["Uf"];
            $empresa["Telefone"] = $row["Telefone"];
            $empresa["Site"] = $row["Site"];
            $empresa["Data"] = $row["Data"];
            $empresa["Logo"] = $row["Logo"];
        }
        $conn->close();
        return $empresa;
    } else {
        $empresa["result"] = 0;
        $conn->close();
        return $empresa;
    }
}

function editarEmpresa($empresa)
{
    require_once "Conexao.php";
    if ($empresa["logo"] == "") {
        $sql = "UPDATE empresa SET Nome_Empresa = '{$empresa["nome"]}', Fantasia = '{$empresa["fantasia"]}', Cnpj = '{$empresa["cnpj"]}', Ie = '{$empresa["ie"]}', Cep = '{$empresa["cep"]}', Endereco = '{$empresa["endereco"]}', Numero = '{$empresa["numero"]}', Bairro = '{$empresa["bairro"]}' , Cidade = '{$empresa["cidade"]}', Uf = '{$empresa["uf"]}', Telefone = '{$empresa["telefone"]}', Site = '{$empresa["site"]}', Data = now()";
    } else {
        $sql = "UPDATE empresa SET Nome_Empresa = '{$empresa["nome"]}', Fantasia = '{$empresa["fantasia"]}', Cnpj = '{$empresa["cnpj"]}', Ie = '{$empresa["ie"]}', Cep = '{$empresa["cep"]}', Endereco = '{$empresa["endereco"]}', Numero = '{$empresa["numero"]}', Bairro = '{$empresa["bairro"]}' , Cidade = '{$empresa["cidade"]}', Uf = '{$empresa["uf"]}', Telefone = '{$empresa["telefone"]}', Site = '{$empresa["site"]}', Data = now(), Logo = '{$empresa["logo"]}'";
    }
    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

// -----------------------------------------Entregador------------------------------------------------------------//
function listarEntregador()
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , entregador.* FROM usuario INNER JOIN entregador on usuario.Id_Usuario = entregador.Usuario WHERE Id_Entregador != 4 ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $entregador = array();
        $entregador["result"] = 1;
        $entregador["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $entregador[$i]["Id_Usuario"] = $row["Id_Usuario"];
            $entregador[$i]["Nome_Usuario"] = $row["Nome_Usuario"];
            $entregador[$i]["Senha"] = $row["Senha"];
            $entregador[$i]["Sexo"] = $row["Sexo"];
            $entregador[$i]["Cep"] = $row["Cep"];
            $entregador[$i]["Complemento"] = $row["Complemento"];
            $entregador[$i]["Numero"] = $row["Numero"];
            $entregador[$i]["Telefone"] = $row["Telefone"];
            $entregador[$i]["Email"] = $row["Email"];
            $entregador[$i]["Nascimento"] = $row["Nascimento"];
            $entregador[$i]["Veiculo"] = $row["Veiculo"];
            $entregador[$i]["Identificacao"] = $row["Identificacao"];
            $entregador[$i]["Usuario"] = $row["Usuario"];
            
            $i++;
        }
        $conn->close();
        return $entregador;
    } else {
        $entregador["result"] = 0;
        $conn->close();
        return $entregador;
    }
}

function adicionarEntregador($entregador)
{
    require_once "Conexao.php";
    $sql = "INSERT INTO usuario (Nome_Usuario,Senha, Sexo,Cep, Numero, Complemento,Telefone, Email,Nascimento,Foto) VALUES ('{$entregador["nome"]}', '{$entregador["senha"]}','{$entregador["sexo"]}','{$entregador["cep"]}','{$entregador["numero"]}','{$entregador["complemento"]}','{$entregador["telefone"]}','{$entregador["email"]}','{$entregador["dataNascimento"]}','{$entregador["foto"]}')";
    $result = $conn->query($sql);
    $ultimoid = mysqli_insert_id($conn);

    if ($result == true) { //tudo certo
        $sql = "INSERT INTO entregador (Veiculo,Identificacao,Usuario) VALUES ('{$entregador["veiculo"]}','{$entregador["identificacao"]}', $ultimoid)";
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

function pegaEntregador($id)
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , entregador.*,cep.* 
    FROM usuario INNER JOIN entregador on usuario.Id_Usuario = entregador.Usuario
    INNER JOIN Cep on usuario.Cep = cep.Id_Cep WHERE usuario.Id_Usuario = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $entregador = array();
        $entregador["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $entregador["Id_Usuario"] = $row["Id_Usuario"];
            $entregador["Nome_Usuario"] = $row["Nome_Usuario"];
            $entregador["Sexo"] = $row["Sexo"];
            $entregador["Numero"] = $row["Numero"];
            $entregador["Complemento"] = $row["Complemento"];
            $entregador["Telefone"] = $row["Telefone"];
            $entregador["Email"] = $row["Email"];
            $entregador["Nascimento"] = $row["Nascimento"];
            $entregador["Foto"] = $row["Foto"];
            $entregador["Veiculo"] = $row["Veiculo"];
            $entregador["Identificacao"] = $row["Identificacao"];
            $entregador["Usuario"] = $row["Usuario"];
            $entregador["Id_Cep"] = $row["Id_Cep"];
            $entregador["Cidade"] = $row["Cidade"];
            $entregador["Logradouro"] = $row["Logradouro"];
            $entregador["Bairro"] = $row["Bairro"];
            $entregador["Cep"] = $row["Cep"];
            $entregador["Tipo"] = $row["Tipo"];
        }
        $conn->close();
        return $entregador;
    } else {
        $entregador["result"] = 0;
        $conn->close();
        return $entregador;
    }
}

function editarEntregador($entregador)
{
    require_once "Conexao.php";
    if ($entregador["senhaNova"] == "" && $entregador["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$entregador["nome"]}', Sexo = '{$entregador["sexo"]}', Cep = '{$entregador["cep"]}', Numero = '{$entregador["numero"]}',Complemento = '{$entregador["complemento"]}', Telefone = '{$entregador["telefone"]}', Email = '{$entregador["email"]}', Nascimento = '{$entregador["dataNascimento"]}' WHERE Id_Usuario = {$entregador["id"]}";
    } else if ($entregador["senhaNova"] == "" && $entregador["foto"] != "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$entregador["nome"]}', Sexo = '{$entregador["sexo"]}', Cep = '{$entregador["cep"]}', Numero = '{$entregador["numero"]}',Complemento = '{$entregador["complemento"]}', Telefone = '{$entregador["telefone"]}', Email = '{$entregador["email"]}', Nascimento = '{$entregador["dataNascimento"]}', Foto = '{$entregador["foto"]}' WHERE Id_Usuario = {$entregador["id"]}";
    } else if ($entregador["senhaNova"] != "" && $entregador["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$entregador["nome"]}', Senha = '{$entregador["senhaNova"]}', Sexo = '{$entregador["sexo"]}', Cep = '{$entregadors["cep"]}', Numero = '{$entregador["numero"]}',Complemento = '{$entregador["complemento"]}', Telefone = '{$entregador["telefone"]}', Email = '{$entregador["email"]}', Nascimento = '{$entregador["dataNascimento"]}' WHERE Id_Usuario = {$entregador["id"]}";
    } else {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$entregador["nome"]}', Senha = '{$entregador["senhaNova"]}', Sexo = '{$entregador["sexo"]}', Cep = '{$entregador["cep"]}', Numero = '{$entregador["numero"]}',Complemento = '{$entregador["complemento"]}', Telefone = '{$entregador["telefone"]}', Email = '{$entregador["email"]}', Nascimento = '{$entregador["dataNascimento"]}', Foto = '{$entregador["foto"]}' WHERE Id_Usuario = {$entregador["id"]}";
    }
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "UPDATE entregador SET Veiculo = '{$entregador["veiculo"]}', Identificacao = '{$entregador["identificacao"]}' WHERE Usuario = {$entregador["idEntregador"]}";
        $result = $conn->query($sql);
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirEntregador($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM entregador WHERE Usuario = {$id}";
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "DELETE FROM usuario WHERE Id_Usuario = {$id}";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return $result;
        } else {
            $conn->close();
            return $result;
        }
    } else {
        $conn->close();
        return $result;
    }
}


// --------------------------------------------CARGO-------------------------------------------------//

function listarCargo()
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM cargo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $cargo = array();
        $cargo["result"] = 1;
        $cargo["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $cargo[$i]["Id_Cargo"] = $row["Id_Cargo"];
            $cargo[$i]["Nome_Cargo"] = $row["Nome_Cargo"];

            $i++;
        }
        $conn->close();
        return $cargo;
    } else {
        $cargo["result"] = 0;
        $conn->close();
        return $cargo;
    }
}

function adicionarCargo($cargo)
{
    require_once "Conexao.php";
    $sql = "INSERT INTO cargo (Nome_Cargo) VALUES ('{$cargo["nome"]}')";
    $result = $conn->query($sql);

    if ($result == true) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function pegaCargo($id)
{

    require_once "Conexao.php";
    $sql = "SELECT * FROM cargo WHERE Id_Cargo = {$id}";
    $result = $conn->query($sql);

    //Se selecionou algum funcionario
    if ($result->num_rows > 0) {
        $cargo = array();
        $cargo["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $cargo["Id_Cargo"] = $row["Id_Cargo"];
            $cargo["Nome_Cargo"] = $row["Nome_Cargo"];
        }
        $conn->close();
        return $cargo;
    } else {
        $cargo["result"] = 0;
        $conn->close();
        return $cargo;
    }
}

function editarCargo($cargo)
{

    require_once "Conexao.php";
    $sql = "UPDATE cargo SET Nome_Cargo = '{$cargo["nome"]}' WHERE Id_Cargo = {$cargo["id"]}";
    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirCargo($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM cargo WHERE Id_Cargo = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function todosCargos()
{
    require_once "Conexao.php";
    $sql = "SELECT * FROM cargo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $cargo = array();
        $cargo["result"] = 1;
        $cargo["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $cargo[$i]["Id_Cargo"] = $row["Id_Cargo"];
            $cargo[$i]["Nome_Cargo"] = $row["Nome_Cargo"];
            $i++;
        }
        $conn->close();
        return $cargo;
    } else {
        $cargo["result"] = 0;
        $conn->close();
        return $cargo;
    }
}

// --------------------------------------------------------Configuração----------------------------------------------------

function pegaConfig()
{

    require_once "Conexao.php";
    $sql = "SELECT * FROM configuracao";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $config = array();
        $config["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $config["Id_Config"] = $row["Id_Config"];
            $config["Data"] = $row["Data"];
            $config["Abre"] = $row["Abre"];
            $config["Fecha"] = $row["Fecha"];
            $config["NrPedido"] = $row["NrPedido"];
            $config["Mensagem"] = $row["Mensagem"];
        }
        $conn->close();
        return $config;
    } else {
        $config["result"] = 0;
        $conn->close();
        return $config;
    }
}

function atualizarConfig($config)
{

    require_once "Conexao.php";
    $sql = "UPDATE configuracao SET Data = now(), Abre = '{$config["abre"]}', Fecha = '{$config["fecha"]}', NrPedido = '{$config["pedido"]}', Mensagem = '{$config["mensagem"]}'";
    $result = $conn->query($sql);
    if ($result == true) { //tudo certo 
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}


// ----------------------------------------CLIENTES----------------------------------------------------------//


function listarCliente()
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , cliente.* FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $cliente = array();
        $cliente["result"] = 1;
        $cliente["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $cliente[$i]["Id_Usuario"] = $row["Id_Usuario"];
            $cliente[$i]["Nome_Usuario"] = $row["Nome_Usuario"];
            $cliente[$i]["Senha"] = $row["Senha"];
            $cliente[$i]["Sexo"] = $row["Sexo"];
            $cliente[$i]["Cep"] = $row["Cep"];
            $cliente[$i]["Complemento"] = $row["Complemento"];
            $cliente[$i]["Numero"] = $row["Numero"];
            $cliente[$i]["Telefone"] = $row["Telefone"];
            $cliente[$i]["Email"] = $row["Email"];
            $cliente[$i]["Nascimento"] = $row["Nascimento"];;
            $cliente[$i]["Id_Cliente"] = $row["Id_Cliente"];
            $cliente[$i]["Referencia"] = $row["Referencia"];
            $cliente[$i]["Usuario"] = $row["Usuario"];
            $i++;
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
    require_once "Conexao.php";
    $sql = "INSERT INTO usuario (Nome_Usuario,Senha, Sexo,Cep, Numero, Complemento,Telefone, Email,Nascimento,Foto) VALUES ('{$cliente["nome"]}', '{$cliente["senha"]}','{$cliente["sexo"]}','{$cliente["cep"]}','{$cliente["numero"]}','{$cliente["complemento"]}','{$cliente["telefone"]}','{$cliente["email"]}','{$cliente["dataNascimento"]}','{$cliente["foto"]}')";
    $result = $conn->query($sql);
    $ultimoid = mysqli_insert_id($conn);

    if ($result == true) { //tudo certo
        $sql = "INSERT INTO cliente (Referencia,Usuario) VALUES ('{$cliente["referencia"]}',$ultimoid)";
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

function pegaCliente($id)
{
    require_once "Conexao.php";
    $sql = "SELECT usuario.* , cliente.*,cep.* 
    FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario
    INNER JOIN Cep on usuario.Cep = cep.Id_Cep WHERE usuario.Id_Usuario = {$id}";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $cliente = array();
        $cliente["result"] = 1;
        while ($row = $result->fetch_assoc()) {
            $cliente["Id_Usuario"] = $row["Id_Usuario"];
            $cliente["Nome_Usuario"] = $row["Nome_Usuario"];
            $cliente["Sexo"] = $row["Sexo"];
            $cliente["Numero"] = $row["Numero"];
            $cliente["Complemento"] = $row["Complemento"];
            $cliente["Telefone"] = $row["Telefone"];
            $cliente["Email"] = $row["Email"];
            $cliente["Nascimento"] = $row["Nascimento"];
            $cliente["Foto"] = $row["Foto"];
            $cliente["Referencia"] = $row["Referencia"];
            $cliente["Usuario"] = $row["Usuario"];
            $cliente["Id_Cep"] = $row["Id_Cep"];
            $cliente["Cidade"] = $row["Cidade"];
            $cliente["Logradouro"] = $row["Logradouro"];
            $cliente["Bairro"] = $row["Bairro"];
            $cliente["Cep"] = $row["Cep"];
            $cliente["Tipo"] = $row["Tipo"];
        }
        $conn->close();
        return $cliente;
    } else {
        $cliente["result"] = 0;
        $conn->close();
        return $cliente;
    }
}

function editarCliente($cliente)
{
    require_once "Conexao.php";
    if ($cliente["senhaNova"] == "" && $cliente["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$cliente["nome"]}', Sexo = '{$cliente["sexo"]}', Cep = '{$cliente["cep"]}', Numero = '{$cliente["numero"]}',Complemento = '{$cliente["complemento"]}', Telefone = '{$cliente["telefone"]}', Email = '{$cliente["email"]}', Nascimento = '{$cliente["dataNascimento"]}' WHERE Id_Usuario = {$cliente["id"]}";
    } else if ($cliente["senhaNova"] == "" && $cliente["foto"] != "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$cliente["nome"]}', Sexo = '{$cliente["sexo"]}', Cep = '{$cliente["cep"]}', Numero = '{$cliente["numero"]}',Complemento = '{$cliente["complemento"]}', Telefone = '{$cliente["telefone"]}', Email = '{$cliente["email"]}', Nascimento = '{$cliente["dataNascimento"]}', Foto = '{$cliente["foto"]}' WHERE Id_Usuario = {$cliente["id"]}";
    } else if ($cliente["senhaNova"] != "" && $cliente["foto"] == "") {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$cliente["nome"]}', Senha = '{$cliente["senhaNova"]}', Sexo = '{$cliente["sexo"]}', Cep = '{$cliente["cep"]}', Numero = '{$cliente["numero"]}',Complemento = '{$cliente["complemento"]}', Telefone = '{$cliente["telefone"]}', Email = '{$cliente["email"]}', Nascimento = '{$cliente["dataNascimento"]}' WHERE Id_Usuario = {$cliente["id"]}";
    } else {
        $sql = "UPDATE usuario SET Nome_Usuario = '{$cliente["nome"]}', Senha = '{$cliente["senhaNova"]}', Sexo = '{$cliente["sexo"]}', Cep = '{$cliente["cep"]}', Numero = '{$cliente["numero"]}',Complemento = '{$cliente["complemento"]}', Telefone = '{$cliente["telefone"]}', Email = '{$cliente["email"]}', Nascimento = '{$cliente["dataNascimento"]}', Foto = '{$cliente["foto"]}' WHERE Id_Usuario = {$cliente["id"]}";
    }
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "UPDATE cliente SET Referencia = '{$cliente["referencia"]}' WHERE Usuario = {$cliente["idCliente"]}";
        $result = $conn->query($sql);
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function excluirCliente($id)
{
    require_once "Conexao.php";
    $sql = "DELETE FROM cliente WHERE Usuario = {$id}";
    $result = $conn->query($sql);

    if ($result == true) {
        $sql = "DELETE FROM usuario WHERE Id_Usuario = {$id}";
        $result = $conn->query($sql);

        if ($result == true) {
            $conn->close();
            return $result;
        } else {
            $conn->close();
            return $result;
        }
    } else {
        $conn->close();
        return $result;
    }
}

// --------------------------------------------------------//-----------------------------------------------------//

function listarVenda(){
    require_once "../model/Conexao.php";
    $sql = "SELECT cliente.*,venda.*,entregador.*,pagamento.* FROM venda JOIN entregador on venda.Entregador = entregador.Id_Entregador JOIN pagamento on venda.Pagamento = pagamento.Id_Pagamento JOIN cliente on venda.Cliente = cliente.Id_Cliente";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $num = $result->num_rows;
        $venda = array();
        $venda["result"] = 1;
        $venda["num"] = $num;
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $venda[$i]["Id_Venda"] = $row["Id_Venda"];
            $venda[$i]["Nro_Venda"] = $row["Nro_Venda"];
            $venda[$i]["Cliente"] = $row["Cliente"];
            $venda[$i]["Data_Venda"] = $row["Data_Venda"];
            $venda[$i]["Entregador"] = $row["Entregador"];
            $venda[$i]["Status"] = $row["Status"];
            $venda[$i]["Valor_Venda"] = $row["Valor_Venda"];
            $venda[$i]["Desconto_Venda"] = $row["Desconto_Venda"];
            $venda[$i]["Adicional_Venda"] = $row["Adicional_Venda"];
            $venda[$i]["Pagamento"] = $row["Pagamento"];
            $venda[$i]["Nome_Pagamento"] = $row["Nome_Pagamento"];
            $i++;
        }
        $conn->close();
        return $venda;
    } else {
        $venda["result"] = 0;
        $conn->close();
        return $venda;
    }

}