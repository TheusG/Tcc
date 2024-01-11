<?php 

class Cliente{

    public $pdo;

    public function __construct()
    {
        try{
           $this->pdo = new PDO("mysql:dbname=db_fivestars;host=localhost","root","");

        }catch(PDOException $e){
            echo "Erro com o banco de dados: " . $e->getMessage() . "<br>";
        }catch(PDOException $e){
            echo "Erro Genérico: " . $e->getMessage() . "<br>";

        }
    }

    public function EmailCliente (){
        $result = array();
        $cmd = $this->pdo->query("SELECT usuario.* FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function InfoCliente ($email,$senha){
        $result = array();
        $cmd = $this->pdo->query("SELECT usuario.* , cliente.*,cep.* 
        FROM usuario INNER JOIN cliente on usuario.Id_Usuario = cliente.Usuario
        INNER JOIN Cep on usuario.Cep = cep.Id_Cep WHERE usuario.Email = '$email' AND usuario.Senha = '$senha'");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function todosClientes(){
        $result = array();
        $cmd = $this->pdo->query("SELECT Id_Cliente, Usuario FROM cliente");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    



    

}
