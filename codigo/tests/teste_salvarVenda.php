<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idcliente = 3;
    $idproduto = 1;
    $valor_total = 25.50;
    $data = "2025-03-27";

    salvarVenda($conexao, $idcliente, $idproduto, $valor_total, $data);
?>
