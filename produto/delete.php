<?php
    include '../db.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $stmt = $conn->prepare("DELETE FROM produtos WHERE id_produto = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
    
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir produto</title>
</head>
<body>
    <h2>Exclusão de produto</h2>
    <p>Deseja realmente excluir o produto?</p>
    <form action="" method="post">
        <button type="submit">Excluir</button>
    </form>
</body>
</html>