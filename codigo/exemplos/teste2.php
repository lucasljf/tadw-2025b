<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>
<body>
    <button id="botao1" class="teste">Exemplo1</button>
    <button id="botao2" class="teste">Exemplo2</button>
    <button id="botao3">Exemplo3</button>
    

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
        function acao1() {
            alert("Executou a ação 1...");
        }

        function acao2() {
            alert("Executou a ação 2...");
        }

        // document.getElementById('botao1').addEventListener("click", acao1);
        
        // $("#botao1").click(acao1);
        
        // $("button").click(acao1);
        // $("button").click(acao2);
        
        $(".teste").click(acao2);
    </script>
</body>
</html>