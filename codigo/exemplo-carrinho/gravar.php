<?php
session_start();

echo "começando a impressão";

echo "<pre>";
print_r($_SESSION['carrinho']);
echo "</pre>";

echo "finalizando a impressão";
