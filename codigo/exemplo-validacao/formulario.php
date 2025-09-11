<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#formulario").validate({
                // regras para cada campo
                rules: {
                    nome: {
                        required: true,
                        minlength: 2,
                    },
                    email: {
                        required: true,
                    },
                    email2: {
                        required: true,
                        equalTo: "#email",
                    }
                },
                // mensagens de erro para cada regra
                messages: {
                    nome: {
                        required: "Esse campo deve ser preenchido",
                        minlength: "O tamanho mínimo é 2.",
                    },
                    email: {
                        required: "Você deve informar um e-mail",
                    },
                    email2: {
                        required: "Você deve confirmar seu e-mail",
                        equalTo: "Os e-mails informados devem ser iguais.",
                    }
                }
            })
        });
    </script>
    <style>
        .error {
            color: blue;
        }
    </style>
</head>
<body>
    <form id="formulario" action="saida.php">
        Nome: <br>
        <input type="text" name="nome" id="nome"> <br><br>

        E-mail: <br>
        <input type="text" name="email" id="email"> <br><br>

        Confirme seu e-mail: <br>
        <input type="text" name="email2" id="email2">
        <br><br>

        Senha: <br>
        <input type="password" name="senha" id="senha"><br><br>

        Confirme sua senha: <br>
        <input type="password" name="senha2" id="senha2"> <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>