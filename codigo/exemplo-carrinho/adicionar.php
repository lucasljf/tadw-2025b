<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (!empty($_POST['idproduto'])) {
    $selecionados = $_POST['idproduto'];

    foreach ($selecionados as $id) {
        $quantidade = $_POST['quantidade'][$id];

        if ($quantidade < 1) {
            $quantidade = 1;
        }

        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] += $quantidade;
        } else {
            $_SESSION['carrinho'][$id] = $quantidade;
        }
    }
}

header("Location: carrinho.php");
exit;
