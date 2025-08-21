<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>

<body>
    <p id="elemento1"></p>

    <p id="elemento2"></p>

    <input type="text" id="campo1">

    <a href="" id="link1">Link 1</a>

    <button id="botao1">Teste</button>

    <br><br>

    <input type="password" id="senha" class="escuro">

    <br><br>

    <table border="1">
        <tr>
            <td>a</td>
            <td>b</td>
        </tr>
        <tr>
            <td>c</td>
            <td>d</td>
        </tr>
    </table>

    <script>
        $("#elemento1").text("Testeeeeee");

        $("#campo1").val("Texto do campo");

        $("#link1").attr("href", "https://www.google.com.br");

        // $("#link1").addClass("escuro");
        // $("#link1").removeClass("claro");

        function mudar() {
            let tipo = $("#senha").attr("type");

            if (tipo == "password") {
                $("#senha").attr("type", "text");
            } else {
                $("#senha").attr("type", "password");
            }
        }

        $("#botao1").click(mudar);
    </script>
</body>

</html>