
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Criar produto</title>
</head>
<body>
    <h2>Registrar novo produto:</h2>
    <form action="create.php" method="post">
        <label for="nomeProduto">Nome:</label>
        <input type="text" name="nomeProduto" id="nome">
        <label for="descricaoProduto">Descrição:</label>
        <input type="text" name="descricaoProduto" id="descricao">
        <label for="precoProduto">Preço:</label>
        <input type="number" step=".01" name="precoProduto" id="preco">
        <label for="quantidadeProduto">Quantidade:</label>
        <input type="number" name="quantidadeProduto" id="quantidade">
        <button type="submit">Registrar Produto</button>
    </form>
    
    <?php
        include '../db.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = $_POST["nomeProduto"];
            $descricao = $_POST["descricaoProduto"];
            $preco = $_POST["precoProduto"];
            $quantidade = $_POST["quantidadeProduto"];
            $id_usuario = 1;

            $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuarios) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdii", $nome, $descricao, $preco, $quantidade, $id_usuario);
            if ($stmt->execute()) {
                header("Location: ../public/produtos.php");
            }else{
                echo "Erro ao cadastrar!";
            }
        }
    ?>
</body>
</html>