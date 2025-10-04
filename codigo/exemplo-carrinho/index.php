<?php
require_once "../funcoes.php";
require_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- link para destrui o carrinho e simular um novo início -->
    <a href="destruir_carrinho.php">destruir carrinho</a>

    <!-- ver produtos que podem ser adicionados -->
    <form action="adicionar.php" method="POST">
        <h2>Listagem de Produtos</h2>

        <ul>
            <?php
            $produtos = listarProdutos($conexao);

            foreach ($produtos as $produto):
            ?>
                <li>
                    <input type="checkbox" name="idproduto[]" value="<?php echo $produto['idproduto'] ?>"> R$ <span><?php echo $produto['preco_venda']; ?></span> -- <?php echo $produto['nome']; ?>

                    <input type="number" name="quantidade[<?php echo $produto['idproduto']; ?>]" value="1" min="1">
                </li>
            <?php endforeach; ?>
        </ul>

        <input type="submit" value="Adicionar selecionados ao carrinho">
    </form>

    <a href="carrinho.php">Ver carrinho</a> <br>
    <a href="carrinho2.php">Ver carrinho2</a>
</body>

</html>
