<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de máscara</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.mask.min.js"></script>
</head>

<body>
    CEP: <br>
    <input type="text" id="cep"> <br><br>

    CPF: <br>
    <input type="text" id="cpf"> <br><br>

    Telefone: <br>
    <input type="text" id="telefone"> <br><br>

    Data de Nascimento: <br>
    <input type="text" id="data_nascimento"> <br><br>

    <script>
        $(document).ready(function() {
            $('#cep').mask('00000-000');
            $('#cpf').mask('000.000.000-00');
            $('#telefone').mask('(00) 00000-0000');
            $('#data_nascimento').mask('00/00/0000');
        });
    </script>
</body>

</html>