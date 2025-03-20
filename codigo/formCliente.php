<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "conexao.php";
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM tb_cliente WHERE idcliente = $id";

        $resultados = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($resultados);

        $nome = $linha['nome'];
        $cpf = $linha['cpf'];
        $endereco = $linha['endereco'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $nome = "";
        $cpf = "";
        $endereco = "";

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
    <form action="salvarCliente.php?id=<?php echo $id; ?>" method="post">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        CPF: <br>
        <input type="text" name="cpf" value="<?php echo $cpf; ?>"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco" value="<?php echo $endereco; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>