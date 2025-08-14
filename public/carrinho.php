<?php
include '../db.php';
session_start();

$pedidos = $_SESSION['carrinho'];
if (isset($pedidos)) {
    echo "<form action='../pedido/finalizarCompra.php' method='POST'>
        <table border ='1'>
            <tr>
                <th> Nome </th>
                <th> Descrição </th>
                <th> Preço unitário </th>
                <th> Quantidade </th>
            </tr>";
    foreach ($pedidos as $pedido => $id) {
        $sql = "SELECT * FROM produtos WHERE id_produtos = $id";
        $result = $conn->query($sql);
        $dado = mysqli_fetch_assoc($result);

        echo "<tr>
            <td> {$dado['nome']} </td>
            <td> {$dado['descricao']} </td>
            <td> {$dado['preco']} </td>
            <td> <input type='number' name='quantidade[$id]'> </td>
            </tr>";
    }
    echo "</table>
    <button type='submit'>Finalizar compra</button>
    </form>";
}

echo 'O carrinho está vazio!';

?>