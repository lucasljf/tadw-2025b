<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idcliente = 1;
    $valor_total = 25.50;
    $data = "2025-03-27";

    echo salvarVenda($conexao, $idcliente, $valor_total, $data);
?>
