<?php
    include '../db.php';

    $sql = 'SELECT * FROM produtos';
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {

        echo "<table border ='1'>
            <tr>
                <th> Nome </th>
                <th> Preço </th>
                <th> Lote </th>
                <th> Data de Validade </th>
                <th> Glúten </th>
                <th> Lactose </th>
                <th> Registrado por </th>
                <th> Ações </th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $textoGluten = 'Não';
        $textoLactose = 'Não';
        if($row['gluten'] == 1){
            $textoGluten = 'Sim';
        }
        if($row['lactose'] == 1){
            $textoLactose = 'Sim';
        }

        echo "<tr>
            <td> {$row['name']} </td>
            <td> {$row['preco']} </td>
            <td> {$row['lote']} </td>
            <td> {$row['validade']} </td>
            <td> " . $textoGluten . " </td>
            <td> " . $textoLactose . " </td>
            <td> {$row['id_user']} </td>
            <td> 
                <a href='../pedido/create.php?idproduto={$row['id']}'>Registrar pedido<a>
                <a href='update.php?id={$row['id']}'>Editar produto<a>
                <a href='delete.php?id={$row['id']}'>Excluir produto<a>
            </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn -> close();
?>