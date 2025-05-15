<?php

function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function salvarCliente($conexao, $nome, $cpf, $endereco) {
    $sql = "INSERT INTO tb_cliente (nome, cpf, endereco) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $endereco);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function listarClientes($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_clientes[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_clientes;
}

function editarCliente($conexao, $nome, $cpf, $endereco, $id) {
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
}

function deletarProduto($conexao, $idproduto) {};

function listarProdutos() {};

function salvarProduto() {};

function editarProduto() {};


//desafio
function salvarUsuario() {};

function salvarVenda($conexao, $idcliente, $valor_total, $data) {
    $sql = "INSERT INTO tb_venda (idcliente, valor_total, data) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ids', $idcliente, $valor_total, $data);

    mysqli_stmt_execute($comando);
    
    $id_venda = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $id_venda;
};

function salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade) {
    $sql = "INSERT INTO tb_item_venda (idvenda, idproduto, quantidade) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iid', $id_venda, $id_produto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

// retornar uma variável com todos os dados do cliente
function pesquisarClienteId($conexao, $idcliente) {
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};

// retornar uma variável com todos os dados do produto
function pesquisarProdutoId() {};

//mostrar o nome do cliente ao invés do id
//mostrar o nome do produto ao invés do id
function listarVendas() {};

function listarItensVenda($conexao, $id_venda) {};

// 1. Faz a função
// 2. Crie um arquivo de teste (pasta tests)
?>
