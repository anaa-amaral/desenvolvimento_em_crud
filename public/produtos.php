<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<div class="flex">

    <a href="../index.php">
        <h2 class="titulo4">
            ⬅️
        </h2><br>
    </a>

    <a href="../produto/create.php" class="btn btn-primary criar"><font dir="auto" style="vertical-align: inherit;"><font dir="auto" style="vertical-align: inherit;">Criar produto</font></font></a>

</div>

<h1 class="text5"><strong> Conheça nossos produtos:<strong></h1><br>

  </body>
  </html>

  <?php
    include '../db.php';

    $sql = 'SELECT produtos.nome, descricao, preco, quantidade_estoque, id_produtos, usuarios.nome AS nome_usuario FROM produtos INNER JOIN usuarios ON produtos.id_usuarios = usuarios.id_usuarios';
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
echo '<div class="produtos">';
    while ($row = $result->fetch_assoc()) {

        echo "<div class='p-3 m-0 border-0 bd-example m-0 border-0'>
            <div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>
                    <font dir='auto' style='vertical-align: inherit;'>

                    <font dir='auto' style='vertical-align: inherit;'>{$row['nome']}</font></font></h5>
                <p class='card-text'>
                    <font dir='auto' style='vertical-align: inherit;'><font dir='auto' style='vertical-align: inherit;'>
                        <strong>R$ {$row['preco']}</strong><br>{$row['descricao']}</font></font></p>
                <a href='../pedido/adicionarAoCarrinho.php?idproduto={$row['id_produtos']}' class='btn btn-primary'><font dir='auto' style='vertical-align: inherit;'><font dir='auto' style='vertical-align: inherit;'>Adicionar ao carrinho</font></font></a>
                <a href='../produto/update.php?id={$row['id_produtos']}' class='btn btn-primary'><font dir='auto' style='vertical-align: inherit;'><font dir='auto' style='vertical-align: inherit;'>Editar</font></font></a>
                <a href='../produto/delete.php?id={$row['id_produtos']}' class='btn btn-danger'><font dir='auto' style='vertical-align: inherit;'><font dir='auto' style='vertical-align: inherit;'>Excluir</font></font></a>
            </div>
            </div>
        </div>";
    }
    echo '</div>';
} else {
    echo "Nenhum produto encontrado.";
}

$conn -> close();
?>