<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$id_venda = 2;
$id_produto = 2;

salvarItemVenda($conexao, $id_venda, $id_produto);