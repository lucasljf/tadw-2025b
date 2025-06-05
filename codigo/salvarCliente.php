<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

//pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gerar um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criar um novo caminho para o arquivo
// lembre-se de criar a pasta e ajustar as permissões
$caminho_destino = "fotos/" . $novo_nome;

// move a foto para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);

if ($id == 0) {
    salvarCliente($conexao, $nome, $cpf, $endereco, $novo_nome);
} else {
    editarCliente($conexao, $nome, $cpf, $endereco, $id);
}

header("Location: listarClientes.php");
