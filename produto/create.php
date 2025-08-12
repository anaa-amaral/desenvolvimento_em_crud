<?php
    include '../db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nomeProduto'];
        $preco = $_POST['precoProduto'];
        $lote = $_POST['loteProduto'];
        $validade = $_POST['validadeProduto'];
        $gluten = false;
        if (isset($_POST['glutenProduto'])){
            $gluten = true;
        }
        $lactose = false;
        if (isset($_POST['lactoseProduto'])){
            $lactose = true;
        }
        $id_usuario = 1;

        $stmt = $conn->prepare("INSERT INTO produtos (name, preco, lote, validade, gluten, lactose, id_user) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sbisiii", $nome, $preco, $lote, $validade, $gluten, $lactose, $id_usuario);
        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        }else{
            echo "Erro ao cadastrar!";
        }
    }
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar produto</title>
</head>
<body>
    <h2>Registrar novo produto:</h2>
    <form action="create.php" method="post">
        <label for="nomeProduto">Nome:</label>
        <input type="text" name="nomeProduto" id="nome">
        <label for="precoProduto">Preço:</label>
        <input type="number" step=".01" name="precoProduto" id="preco">
        <label for="loteProduto">Lote:</label>
        <input type="number" name="loteProduto" id="lote">
        <label for="validadeProduto">Data de validade:</label>
        <input type="date" name="validadeProduto" id="validade">
        <label for="glutenProduto">Contém glúten:</label>
        <input type="checkbox" name="glutenProduto" id="gluten">
        <label for="lactoseProduto">Contém lactose:</label>
        <input type="checkbox" name="lactoseProduto" id="lactose">
        <button type="submit">Registrar Produto</button>
    </form>
</body>
</html>