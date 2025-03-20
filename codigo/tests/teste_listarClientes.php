<?php

require_once "../conexao.php";
require_once "../funcoes.php";

echo "<pre>";
print_r(listarClientes($conexao));
echo "</pre>";
?>