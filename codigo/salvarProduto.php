<?php
require_once "conexao.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$preco_compra = $_POST['preco_compra'];
$preco_venda = $_POST['preco_venda'];
$margem_lucro = $_POST['margem_lucro'];
$quantidade = $_POST['quantidade'];

if ($id == 0) {
    // echo "novo";
    $sql = "INSERT INTO tb_produto (nome, tipo, preco_compra, preco_venda, margem_lucro, quantidade) VALUES ('$nome', '$tipo', $preco_compra, $preco_venda, $margem_lucro, $quantidade)";
} else {
    // echo "atualizar";
    $sql = "UPDATE tb_produto SET nome = '$nome', tipo = '$tipo', preco_compra = $preco_compra, preco_venda = $preco_venda, margem_lucro = $margem_lucro, quantidade = $quantidade WHERE idproduto = $id";
}
mysqli_query($conexao, $sql);
