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
    // echo "atualizar";
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $id);
}
// mysqli_stmt_execute($comando);
