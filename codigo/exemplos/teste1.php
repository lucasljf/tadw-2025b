<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button onclick="acao1()">Exemplo 1</button>
    <br><br>
    <button id="botao2">Exemplo 2</button>

    <script>
        function acao1() {
            alert("Executou a ação 1...");
        }
        
        function acao2() {
            alert("Executou a ação 2...");
        }
        
        // boa prática
        // addEventListener
        
        // document.getElementById('botao2').onclick = acao1;
        // document.getElementById('botao2').onclick = acao1;
        
        document.getElementById('botao2').addEventListener("click", acao1);
        document.getElementById('botao2').addEventListener("click", acao2);
    </script>
</body>

</html>