<?php 

class Produto{

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

    public function codigoProdutos(){
        $result = array();
        $cmd = $this->pdo->query("SELECT Cod_Produto FROM produto");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function exibirProduto(){
        $result = array();
        $cmd = $this->pdo->query("SELECT produto.*, categoria.Id_Categoria, categoria.Nome_Categoria FROM produto INNER JOIN categoria on produto.Categoria = categoria.Id_Categoria WHERE Status_Produto = 1");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function mostrarInfo($id){
        $result = array();
        $cmd = $this->pdo->query("SELECT * FROM produto WHERE Id_Produto = $id");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}



?>