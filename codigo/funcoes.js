function teste() {
    console.log("testeeeeee");
}

function calcular() {
    let quantidade1 = document.getElementById('quantidade[1]').value;
    let preco1 = document.getElementById('preco[1]').innerHTML;
    
    let total = quantidade1 * preco1;
    
    let quantidade3 = document.getElementById('quantidade[3]').value;
    let preco3 = document.getElementById('preco[3]').innerHTML;
    
    total = total + (quantidade3 * preco3);
    
    document.getElementById('valor_total').value = total;
    document.getElementById('total').innerHTML = total;
    console.log("finalizou...");
}

function aviso() {
    // alert("oi");
    console.log("oi");
}
