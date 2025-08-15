<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
    <title>Todos os pedidos</title>
</head>
<body>

    <div class="flex">

        <a href="../index.php">
            <h2 class="titulo4">&#8592;</h2><br>
        </a>

    </div>

    <h1>Todos os Pedidos</h1>
    
    <?php
        include '../db.php';
        
        $sql = 'SELECT id_pedidos, produtos.nome AS nome_produto, clientes.nome AS nome_clientes, quantidade, data_pedido, produtos.preco AS preco_unitario, status FROM pedidos INNER JOIN clientes ON pedidos.id_clientes = clientes.id_clientes INNER JOIN produtos ON pedidos.id_produtos = produtos.id_produtos';
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            echo "<table border ='1'>
            <tr>
            <th> Data </th>
            <th> Produto </th>
            <th> CLiente </th>
            <th> Quantidade </th>
            <th> Preço Total </th>
            <th> Status </th>
            <th> Ações </th>
            </tr>";
            
            while ($row = $result->fetch_assoc()) {
                $precoTotal = $row['quantidade'] * $row['preco_unitario'];
                echo "<tr>
                <td> {$row['data_pedido']} </td>
                <td> {$row['nome_produto']} </td>
                <td> {$row['nome_clientes']} </td>
                <td> {$row['quantidade']} </td>
                <td> {$precoTotal} </td>
                <td> {$row['status']} </td>
                <td> 
                <a href='update.php?id={$row['id_pedidos']}'>Editar Status ou Quantidade<a>
                <a href='delete.php?id={$row['id_pedidos']}'>Excluir<a>
                </td>
                </tr>";
            }
            echo "</table>";
            } else {
                echo "Nenhum pedido encontrado.";
            }
            
            $conn -> close();
    ?>
</body>
</html>