<?php
include '../db.php';
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$pedidos = $_POST['pedidos'];
    $pedidos = [3];
    if(isset($pedidos)){
        echo "<table border ='1'>
            <tr>
                <th> Nome </th>
                <th> Descrição </th>
                <th> Preço </th>
                <th> Quantidade em estoque </th>
            </tr>";
        foreach($pedidos as $pedido => $id){
            $sql = "SELECT * FROM produtos WHERE id_produtos = $id";
            $result = $conn->query($sql);
            $dado = mysqli_fetch_assoc($result);

            echo "<tr>
            <td> {$dado['nome']} </td>
            <td> {$dado['descricao']} </td>
            <td> {$dado['preco']} </td>
            <td> {$dado['quantidade_estoque']} </td>
            </tr>";
        }
        echo "</table>";
    }
//}

?>