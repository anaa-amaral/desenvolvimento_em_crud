<?php
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bumbameupao";

    $conn = new mysqli($server, $username, $password, $dbname);

    if($conn -> connect_error){
        die("Ocorreu um erro ao conectar com o banco de dados: " . $conn -> connect_error);
    }
?>