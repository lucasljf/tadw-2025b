<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome_pesquisado = "c";
$clientes = pesquisarClienteNome($conexao, $nome_pesquisado);

foreach ($clientes as $cliente) {
    echo $cliente["nome"] . " - " . $cliente["cpf"] . "<br>";
}
