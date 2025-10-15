<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="form-busca.php">
    Nome do cliente: <br>
    <input type="text" name="valor"> <br><br>

    <input type="submit" value="Pesquisar">
  </form>
  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    $valor = $_GET["valor"];

    require_once "../conexao.php";
    require_once "../funcoes.php";

    $clientes = pesquisarClienteNome($conexao, $valor);

    if (count($clientes) == 0) {
      echo "<p>Nenhum cliente encontrado</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>CPF</th>";
      echo "</tr>";
      foreach ($clientes as $cliente) {
        echo "<tr>";
        echo "<td>" . $cliente["nome"] . "</td>";
        echo "<td>" . $cliente["cpf"] . "</td>";
        echo "</tr>";
      }
    }
  }
  ?>
</body>

</html>