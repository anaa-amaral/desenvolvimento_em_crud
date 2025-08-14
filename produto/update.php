<?php
    include '../db.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id_produtos = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $dado = mysqli_fetch_assoc($res);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nomeProduto"];
            $descricao = $_POST["descricaoProduto"];
            $preco = $_POST["precoProduto"];
            $quantidade = $_POST["quantidadeProduto"];

            $stmt2 = $conn->prepare("UPDATE produtos SET nome=?, descricao=?, preco=?, quantidade_estoque=? WHERE id_produtos=?");
            $stmt2->bind_param("ssdii", $nome, $descricao, $preco, $quantidade, $id);
            if ($stmt2->execute()) {
                header("Location: index.php");
            }else{
                echo "Erro ao cadastrar!";
            }
        }
        if (!$dado) {
            die("Usuário não encontrado.");
        }
    }else{
        header("Location: ../index.php");
    }
    

        
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
    <h2>Editar produto</h2>
    <form action="update.php?id=<?= $id ?>" method="post">
        <label for="nomeProduto">Nome:</label>
        <input type="text" name="nomeProduto" value="<?= $dado['nome'] ?>" id="nome">
        <label for="descricaoProduto">Descrição:</label>
        <input type="text" name="descricaoProduto" value="<?= $dado['descricao'] ?>" id="descricao">
        <label for="precoProduto">Preço:</label>
        <input type="number" step=".01" name="precoProduto" value="<?= $dado['preco'] ?>" id="preco">
        <label for="quantidadeProduto">Quantidade:</label>
        <input type="number" name="quantidadeProduto" value="<?= $dado['quantidade_estoque'] ?>" id="quantidade">
        <button type="submit">Editar Produto</button>
    </form>
</body>
</html>