<?php

function deletarCliente($conexao, $idcliente)
{
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

function salvarCliente($conexao, $nome, $cpf, $endereco, $foto)
{
    $sql = "INSERT INTO tb_cliente (nome, cpf, endereco, foto) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ssss', $nome, $cpf, $endereco, $foto);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

function listarClientes($conexao)
{
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

function editarCliente($conexao, $nome, $cpf, $endereco, $id)
{
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $endereco, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
}

// TODO: implementar essa função
function deletarProduto($conexao, $idproduto) {};

function listarProdutos($conexao)
{
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $lista_produtos[] = $produto;
    }

    mysqli_stmt_close($comando);
    return $lista_produtos;
}
// TODO: implementar essa função
function salvarProduto() {};

// TODO: implementar essa função
function editarProduto() {};


// TODO: implementar essa função
function salvarUsuario() {};

function salvarVenda($conexao, $idcliente, $valor_total, $data)
{
    $sql = "INSERT INTO tb_venda (idcliente, valor_total, data) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'ids', $idcliente, $valor_total, $data);

    mysqli_stmt_execute($comando);

    $id_venda = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $id_venda;
};

function salvarItemVenda($conexao, $id_venda, $id_produto, $quantidade)
{
    $sql = "INSERT INTO tb_item_venda (idvenda, idproduto, quantidade) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iid', $id_venda, $id_produto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}

// retornar uma variável com todos os dados do cliente
function pesquisarClienteId($conexao, $idcliente)
{
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};

function pesquisarClienteNome($conexao, $nome)
{
    $sql = "SELECT * FROM tb_cliente WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);

    $nome = "%" . $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);

    $resultados = mysqli_stmt_get_result($comando);

    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_clientes[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_clientes;
};
// retornar uma variável com todos os dados do produto
function pesquisarProdutoId($conexao, $idproduto)
{
    $sql = "SELECT * FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
};

//mostrar o nome do cliente ao invés do id
//mostrar o nome do produto ao invés do id
function listarVendas($conexao)
{
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_vendas = [];
    while ($venda = mysqli_fetch_assoc($resultado)) {
        // buscando o cliente para pegar o nome
        $id_cliente = $venda['idcliente'];
        $cliente = pesquisarClienteId($conexao, $id_cliente);
        $nome_cliente = $cliente['nome'];

        $venda['nome_cliente'] = $nome_cliente;

        // buscando os itens da venda
        $id_venda = $venda['idvenda'];
        $itens = listarItemVenda($conexao, $id_venda);

        $venda['itens'] = $itens;

        $lista_vendas[] = $venda;
    }

    mysqli_stmt_close($comando);
    return $lista_vendas;
};

function listarItemVenda($conexao, $idvenda)
{
    $sql = "SELECT * FROM tb_item_venda WHERE idvenda = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idvenda);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $lista_itens = [];
    while ($item = mysqli_fetch_assoc($resultado)) {

        // buscando o produto para pegar o nome
        $id_produto = $item['idproduto'];
        $produto = pesquisarProdutoId($conexao, $id_produto);
        $nome_produto = $produto['nome'];

        $item['nome_produto'] = $nome_produto;
        $lista_itens[] = $item;
    }

    mysqli_stmt_close($comando);
    return $lista_itens;
}

/**
 * Verificar o login e senha de um usuário
 * 
 * A par.....
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $email O e-mail informado pelo usuário.
 * @param string $senha A senha informada pelo usuário.
 * @return int ID do usuário.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
function verificarLogin($conexao, $email, $senha)
{
    $sql = "SELECT * FROM tb_usuario WHERE email = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 's', $email);

    mysqli_stmt_execute($comando);

    $resultado = mysqli_stmt_get_result($comando);
    $quantidade = mysqli_num_rows($resultado);

    $iduser = 0;
    if ($quantidade != 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $senha_banco = $usuario['senha'];

        if (password_verify($senha, $senha_banco)) {
            $iduser = $usuario['idusuario'];
        }
    }
    return $iduser;
}

/**
 * Retorna os dados de um usuário a partir do ID.
 *
 * Retorna nome e tipo do usuário a partir do ID informado.
 *
 * @param mysqli $conexao Conexão com o banco.
 * @param int $idusuario ID de um usuário existente.
 * @return array $usuario['nome', 'tipo']
 * @throws 0 Caso não encontrar o ID informado.
 **/
function pegarDadosUsuario($conexao, $idusuario)
{
    $sql = "SELECT nome, tipo FROM tb_usuario WHERE idusuario = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $quantidade = mysqli_num_rows($resultado);

    if ($quantidade != 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;
    } else {
        return 0;
    }
}
