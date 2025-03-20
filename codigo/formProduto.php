<?php
if (isset($_GET['id'])) {
    // echo "editar";

    require_once "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_produto WHERE idproduto = $id";

    $resultados = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultados);

    //porque não tem a variável do $id aqui?
    $nome = $linha['nome'];
    $tipo = $linha['tipo'];
    $preco_compra = $linha['preco_compra'];
    $preco_venda = $linha['preco_venda'];
    $margem_lucro = $linha['margem_lucro'];
    $quantidade = $linha['quantidade'];

    $botao = "Atualizar";
} else {
    // echo "novo";
    $id = 0;
    $nome = "";
    $tipo = "";
    $preco_compra = "";
    $preco_venda = "";
    $margem_lucro = "";
    $quantidade = "";

    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Cadastro de Cliente</h1>
    <form action="salvarProduto.php?id=<?php echo $id; ?>" method="post">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        
        Tipo: <br>
        <input type="text" name="tipo" value="<?php echo $tipo; ?>"> <br><br>
        Preço de compra: <br>
        <input type="text" name="preco_compra" value="<?php echo $preco_compra; ?>"> <br><br>
        Preço de venda: <br>
        <input type="text" name="preco_venda" value="<?php echo $preco_venda; ?>"> <br><br>
        Margem de lucro: <br>
        <input type="text" name="margem_lucro" value="<?php echo $margem_lucro; ?>"> <br><br>
        Quantidade: <br>
        <input type="text" name="quantidade" value="<?php echo $quantidade; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>

</html>