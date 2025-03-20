<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome = "Ciclano";
$cpf = "000.000.000-00";
$endereco = "Rua 2";
$codigo = 1;

editarCliente($conexao, $nome, $cpf, $endereco, $codigo);
?>