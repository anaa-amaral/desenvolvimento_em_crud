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
            </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn -> close();
?>