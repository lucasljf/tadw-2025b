<?php
session_start();

$id_item = $_POST['id'];
$nova_quantidade = $_POST['quantidade'];

if ($nova_quantidade < 1) {
  $nova_quantidade = 1;
}

if (isset($_SESSION['carrinho'][$id_item])) {
  $_SESSION['carrinho'][$id_item] = $nova_quantidade;
}
