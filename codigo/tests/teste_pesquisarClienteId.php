<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 7;

echo "<pre>";
print_r(pesquisarClienteId($conexao, $idcliente));
echo "</pre>";
?>