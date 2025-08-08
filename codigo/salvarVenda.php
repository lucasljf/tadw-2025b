<?php
require_once "conexao.php";
require_once "funcoes.php";

$idcliente = $_GET['idcliente'];
$total = $_GET['valor_total'];
$data = $_GET['data_compra'];

$idprodutos = $_GET['idproduto'];
$quantidades = $_GET['quantidade'];

foreach ($idprodutos as $id) {
    $produtos[] = [$id, $quantidades[$id]];
}

//gravar a venda
$idvenda = salvarVenda($conexao, $idcliente, $total, $data);

//gravar os itens da venda
foreach ($produtos as $p) {
    salvarItemVenda($conexao, $idvenda, $p[0], $p[1]);
}
?>