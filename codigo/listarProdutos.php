<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Tipo</td>
            <td>PreçoCompra</td>
            <td>PreçoVenda</td>
            <td>MargemLucro</td>
            <td>Quantidade</td>
            <td colspan="2">Ação</td>
        </tr>
            <?php
                require_once "conexao.php";

                $sql = "SELECT * FROM tb_produto";

                $resultados = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultados)) {
                    $id = $linha['idproduto'];
                    $nome = $linha['nome'];
                    $tipo = $linha['tipo'];
                    $preco_compra = $linha['preco_compra'];
                    $preco_venda = $linha['preco_venda'];
                    $margem_lucro = $linha['margem_lucro'];
                    $quantidade = $linha['quantidade'];


                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$nome</td>";
                    echo "<td>$tipo</td>";
                    echo "<td>$preco_compra</td>";
                    echo "<td>$preco_venda</td>";
                    echo "<td>$margem_lucro</td>";
                    echo "<td>$quantidade</td>";
                    echo "<td><a href='deletarProduto.php?id=$id'>Excluir</a></td>";
                    echo "<td><a href='formProduto.php?id=$id'>Editar</a></td>";
                    echo "</tr>";
                }
            ?>
    </table>
</body>
</html>