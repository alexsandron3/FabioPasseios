function Calcular ()
{
    ValorPago = document.getElementById("ValorPago").value;
    ValorPasseio = document.getElementById("ValorPasseio").value;
    document.getElementById("resultado").innerHTML = ValorPasseio - ValorPago;

}