<?php
session_start();

unset($_SESSION['carrinho']);
header("Location: ../public/carrinho.php");
?>