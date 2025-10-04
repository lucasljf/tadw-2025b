<?php
session_start();

require_once "../conexao.php";
require_once "../funcoes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- ver carrinho atual -->
    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "carrinho vazio";
    } else {
        $total = 0;
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>Tipo</td>";
        echo "<td>Nome</td>";
        echo "<td>Preço</td>";
        echo "<td>Quantidade</td>";
        echo "<td>Total unitário</td>";
        echo "<td>Remover</td>";
        echo "</tr>";
        foreach ($_SESSION['carrinho'] as $id => $quantidade) {
            $produto = pesquisarProdutoId($conexao, $id);

            echo "<tr>";
            echo "<td>" . $produto['tipo'] . "</td>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td> R$ " . $produto['preco_venda'] . "</td>";
            echo "<td>$quantidade</td>";

            $total_unitario = $produto['preco_venda'] * $quantidade;
            $total += $total_unitario;

            echo "<td> R$ $total_unitario</td>";
            echo "<td><a href='remover.php?id=$id'>[remover]</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<h3>Total da compra: R$ $total </h3>";
    }
    ?>

    <p>
        <a href="index.php">Adicionar produtos</a> <br>
        <a href="carrinho2.php">Ver carrinho (jQuery)</a>
    </p>
</body>

</html>
