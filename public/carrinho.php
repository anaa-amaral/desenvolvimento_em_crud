<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="flex">

            <a href="../index.php">
                <h2 class="titulo4">&#8592;</h2><br>
            </a>

        </div>

    </body>
</html>

<?php
include '../db.php';
session_start();
if(isset($_SESSION['carrinho'])){
    $pedidos = $_SESSION['carrinho'];
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
    </form>
    <a href='../pedido/limparCarrinho.php'>Limpar o carrinho</a>";
    
}else{
    echo 'O carrinho está vazio!';
};

?>

<a href='meusPedidos.php?id=1'>
        <h1>
            Ver status do meu pedido
        </h1><br>
</a>

