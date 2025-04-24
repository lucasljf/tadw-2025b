<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$id_cliente = 2;
$valor_total = 30.2;
$data = "2025-12-30";

$produtos = [2, 3, 5, 8, 10];
$quantide = [3, 5, 1, 9, 20];

$id_venda = salvarVenda($conexao, $id_cliente, $valor_total, $data);

foreach ($produtos as $produto) {
    salvarItemVenda($conexao, $id_venda, $produto, $quantidade);
}