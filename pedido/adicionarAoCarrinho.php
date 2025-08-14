<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$_SESSION['carrinho'][count($_SESSION['carrinho'])] += $_GET['idproduto'];
header("Location: ../public/carrinho.php");
?>