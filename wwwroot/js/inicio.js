    $('.carousel').carousel();
    cotacaoHoje();
    
    function IrBaixo(dado) {
      var elmnt = document.getElementById(dado);
      elmnt.scrollIntoView(false);
      console.log(dado);
    }

    var ctx = document.getElementsByClassName("myChart");

    var chatgraph = new Chart(ctx, {
      type: 'line',
      options: {
        responsive: true,
      }
    });

    function validacaoEmail() {
      
      var field = document.getElementById("contatoEmail");
      console.log(field.value);
      usuario = field.value.substring(0, field.value.indexOf("@"));
      dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
      
      if ((usuario.length >=1) &&
          (dominio.length >=3) &&
          (usuario.search("@")==-1) &&
          (dominio.search("@")==-1) &&
          (usuario.search(" ")==-1) &&
          (dominio.search(" ")==-1) &&
          (dominio.search(".")!=-1) &&
          (dominio.indexOf(".") >=1)&&
          (dominio.lastIndexOf(".") < dominio.length - 1)) {
        document.getElementById("msgemail").innerHTML="<span>E-mail válido</span>";
      }
      else{
        document.getElementById("msgemail").innerHTML="<span style='color:#FF9C5A'>E-mail inválido </span>";
      }
      }
      

function CalcularMoeda(){
    let moedas = buscaMoeda();    

    const valorCalculo =  Number.parseFloat(document.getElementById("valorCalculo").value);
    const moedaEntrada = document.getElementById("selectMoedaEntrada").selectedOptions[0].value;
    const moedaSaida = document.getElementById("selectMoedaSaida").selectedOptions[0].value;
    debugger
    if(valorCalculo=="" || valorCalculo<0){
        alert('Valor invalido');
        return;
    }
    
    const token = valorCalculo * moedas[moedaEntrada];
    const result = token / moedas[moedaSaida];
    
    const text = "Resulta em R$ " + result.toFixed(2) + " " + moedaEntrada;
    const textTitle = result.toFixed(2) + " " + moedaEntrada;
    
    document.getElementById("moedaResultado").innerHTML="<span style='background-color: rgba(255,255,255,0.7);font-size:20px;color:black;padding:14px 50px;' title=" + textTitle + "> " + text + "</span>";
    
}