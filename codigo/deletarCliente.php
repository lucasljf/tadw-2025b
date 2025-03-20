<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $id = $_GET['id'];

    if (deletarCliente($conexao, $id)) {
        header("Location: listarClientes.php");
    }
    else {
        header("Location: erro.php");
    }

?>