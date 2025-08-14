<?php
    include '../db.php';

    $sql = 'SELECT * FROM produtos';
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {

        echo "<table border ='1'>
            <tr>
                <th> Nome </th>
                <th> Descrição </th>
                <th> Preço </th>
                <th> Quantidade em estoque </th>
                <th> Ações </th>
            </tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
            <td> {$row['nome']} </td>
            <td> {$row['descricao']} </td>
            <td> {$row['preco']} </td>
            <td> {$row['quantidade_estoque']} </td>
            <td> {$row['id_usuarios']} </td>
            <td> 
                <a href='../pedido/create.php?idproduto={$row['id_produtos']}'>Registrar pedido<a>
                <a href='update.php?id={$row['id_produtos']}'>Editar produto<a>
                <a href='delete.php?id={$row['id_produtos']}'>Excluir produto<a>
            </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn -> close();
?>