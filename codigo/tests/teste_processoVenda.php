<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$id_cliente = 2;
$valor_total = 30.2;
$data = "2025-12-30";

// $produtos = [2, 3, 5, 8, 10];
// $quantide = [3, 5, 1, 9, 20];

// lembrar do carrinho de compras
$produtos = [
//  produto, quantidade
    [1, 3], 
    [3, 5], 
    [2, 1],
];


$id_venda = salvarVenda($conexao, $id_cliente, $valor_total, $data);

// for ($i = 0; $i < sizeof($produtos); $i++) {
//     salvarItemVenda($conexao, $id_venda, $produto[$i], $quantide[$i]);
// }

// quebra a variável $produto em $p (cada uma das 3 partes)
foreach ($produtos as $p) {
    salvarItemVenda($conexao, $id_venda, $p[0], $p[1]);
}
