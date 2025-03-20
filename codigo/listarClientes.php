<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de clientes</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_clientes = listarClientes($conexao);

    if (count($lista_clientes) == 0) {
        echo "Não existem clientes cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Endereço</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_clientes as $cliente) {
            $idcliente = $cliente['idcliente'];
            $nome = $cliente['nome'];
            $cpf = $cliente['cpf'];
            $endereco = $cliente['endereco'];

            echo "<tr>";
            echo "<td>$idcliente</td>";
            echo "<td>$nome</td>";
            echo "<td>$cpf</td>";
            echo "<td>$endereco</td>";
            echo "<td><a href='deletarCliente.php?id=$idcliente'>Excluir</a></td>";
            echo "<td><a href='formCliente.php?id=$idcliente'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
</body>

</html>