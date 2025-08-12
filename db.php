<?php
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bumbameupao";
    $port = "4406"; // Substituir pela porta correta para cada computador

    $conn = new mysqli($server, $username, $password, $dbname, $port);

    if($conn -> connect_error){
        die("Ocorreu um erro ao conectar com o banco de dados: " . $conn -> connect_error);
    }
?>