<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_produto WHERE idproduto = $id";

    mysqli_query($conexao, $sql);
?>