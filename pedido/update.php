
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Editar pedido</title>
</head>
<body>
    <h2>Editar pedido</h2>
    <form action="update.php?id=<?= $id ?>" method="post">
        <label for="statusPedido">Status:</label>
        <input type="text" name="statusPedido" value="<?= $dado['status'] ?>" id="status">
        <label for="quantidadePedido">Quantidade:</label>
        <input type="number" name="quantidadePedido" value="<?= $dado['quantidade'] ?>" id="quantidade">
        <button type="submit">Aplicar</button>
    </form>
    
    <?php
        include '../db.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM pedidos WHERE id_pedidos = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();
            $dado = mysqli_fetch_assoc($res);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $status = $_POST["statusPedido"];
                $quantidade = $_POST["quantidadePedido"];

                $stmt2 = $conn->prepare("UPDATE pedidos SET status=?, quantidade=? WHERE id_pedidos=?");
                $stmt2->bind_param("sii", $status, $quantidade, $id);
                if ($stmt2->execute()) {
                    header("Location: pedidos.php");
                }else{
                    echo "Erro ao cadastrar!";
                }
            }
            if (!$dado) {
                die("Produto não encontrado.");
            }
        }else{
            header("Location: pedidos.php");
        }
        

            
    ?>
</body>
</html>