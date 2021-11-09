  //API key c81746093340efadbff43b54
function fazGetAPI(url){
    let request = new XMLHttpRequest(url);
    request.open("GET", url, false);
    request.send();
    return request.responseText;
}

function buscaMoeda(){
    const url = 'https://v6.exchangerate-api.com/v6/c81746093340efadbff43b54/latest/USD';
    let data = fazGetAPI(url);
    let usuarios = JSON.parse(data);
    
    return {
        USD:usuarios.conversion_rates.USD,
        BRL:usuarios.conversion_rates.BRL,
        EUR:usuarios.conversion_rates.EUR    
        }
    //console.log(usuarios.conversion_rates)
}

function cotacaoHoje(){
    debugger
    const dates= formatDateParaBusca(new Date(), 3);    
    buscaCotacao(dates.begin,dates.end);
}

function cotacaoPorPeriodo(){

}

function buscaCotacao(DateOne, DateTwo){
    //10-02-2021
    let dataInicial = DateOne;
    let dataFinal = DateTwo;

    const url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo"+
                "(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial='" + dataInicial + 
                                                                            "'&@dataFinalCotacao='" + dataFinal + "'"+
                "&$top=1&$format=json&$select=cotacaoVenda,dataHoraCotacao";
    
    let data = fazGetAPI(url);
    let usuarios = JSON.parse(data);

    console.log(usuarios.value[0].cotacaoVenda)
    return usuarios;
}

function formatDateParaBusca(date, interval){
    
    var data = date;

    const dataOne = formatDayAndMonth(data.getMonth()) + "-" + formatDayAndMonth(data.getDate()) + "-" + data.getFullYear();
    
    data.setDate(date.getDate() - interval);

    const dataTwo = formatDayAndMonth(data.getMonth()) + "-" + formatDayAndMonth(data.getDate()) + "-" + data.getFullYear();

    return {begin:dataTwo, end:dataOne};
}

function formatDayAndMonth(value){
    return value<10 ? "0"+value:value;
}