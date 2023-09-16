<?php 

class Empresa{

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

    public function infoEmpresa(){
        $result = array();
        $cmd = $this->pdo->query("SELECT * FROM empresa");
        $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}