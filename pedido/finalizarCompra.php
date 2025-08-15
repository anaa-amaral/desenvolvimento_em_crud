<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = 1;
    $data_pedido = date('Y-m-d h:i:s', time());  
    $status = 'PREPARANDO';

    foreach ($_POST['quantidade'] as $id => $qtd) {
        $id_produto = $id;

        $sql = "SELECT * FROM produtos WHERE id_produtos=$id_produto";
        $result = $conn->query($sql);
        $qtdEstoque = $result->fetch_assoc()['quantidade_estoque'];
        if($qtdEstoque < $qtd || $qtd <= 0){
            die("A compra não pode ser concluída pois existem itens com quantidades maiores que o estoque ou a quantidade é inválida. <a href='../public/carrinho.php'>Voltar</a>");
        }
        $novoQtd = ($qtdEstoque - $qtd);
        $stmt2 = $conn->prepare("UPDATE produtos SET quantidade_estoque=? WHERE id_produtos=?");
        $stmt2->bind_param("ii", $novoQtd, $id_produto);
        $stmt2->execute();
    }

    foreach ($_POST['quantidade'] as $id => $qtd) {
        $id_produto = $id;

        $stmt = $conn->prepare("INSERT INTO pedidos (id_clientes, id_produtos, quantidade, data_pedido, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $id_cliente, $id_produto, $qtd, $data_pedido, $status);
        $stmt->execute();

        
    }

    header("Location: limparCarrinho.php");
    
    
}

?>