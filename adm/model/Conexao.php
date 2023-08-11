<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_fivestars";

    //Criando conexão com banco de dados
    $conn = new mysqli($servername, $username, $password , $dbname);

    //checando a conexão
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

?>