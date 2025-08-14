<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = 1;
    $data_pedido = date('Y-m-d h:i:s', time());  
    $status = 'PREPARANDO';

    foreach ($_POST['quantidade'] as $id => $qtd) {
        $id_produto = $id;

        $stmt = $conn->prepare("INSERT INTO pedidos (id_clientes, id_produtos, quantidade, data_pedido, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $id_cliente, $id_produto, $qtd, $data_pedido, $status);
        $stmt->execute();

        
    }

    header("Location: limparCarrinho.php");
    
    
}

?>