<?php 

class Carrinho{

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

    public function mostrarCarrinho(){
        $result = array();
        $cmd = $this->pdo->query("SELECT produto.*, carrinho.* FROM produto INNER JOIN carrinho on produto.Id_Produto = carrinho.Cod_Produto WHERE Cliente = 7");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function quantidadeProduto(){
        $result = array();
        $cmd = $this->pdo->query("SELECT COUNT(*) AS total_linhas FROM carrinho WHERE Cliente = 7");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}