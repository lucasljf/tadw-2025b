<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

if ($id == 0) {
    salvarCliente($conexao, $nome, $cpf, $endereco);
} else {
    editarCliente($conexao, $nome, $cpf, $endereco, $id);
}

header("Location: listarClientes.php");
