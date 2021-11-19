
function fazGetAPI(url){
    let request = new XMLHttpRequest(url);
    request.open("GET", url, false);
    request.send();
    return request.responseText;
}

function cotacaoHoje(){
    
    const dates= formatDateParaBusca(new Date(), 3);    
    buscaCotacao(dates.begin,dates.end);
}

function cotacaoPorPeriodo(periodo){
    
    let datePeriod = new Date();
    let dateMonth = datePeriod.getMonth();
    

    let values = [];
    let monthValues = [];
    for(var count=0; count<periodo;count++){

        let dates= formatDateParaBusca(datePeriod, 3);
        datePeriod.setMonth(dateMonth-count);
        

        values.push(buscaCotacao(dates.begin,dates.end)[0]);
        monthValues.push(parseNumberToMonth(buscaCotacao(dates.begin,dates.end)[1]));
    }

    console.log(values);
    return [values.reverse(), monthValues.reverse()];
}


//////////////////////////////////


//API EXCHANGERATE
//API key c81746093340efadbff43b54
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

//API BANCO CENTRAL
function buscaCotacao(DateOne, DateTwo){
    //10-02-2021
    let dataInicial = DateOne;
    let dataFinal = DateTwo;

    const url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo"+
                "(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial='" + dataInicial + 
                                                                            "'&@dataFinalCotacao='" + dataFinal + "'"+
                "&$top=1&$format=json&$select=cotacaoVenda,dataHoraCotacao";
    
    let data = fazGetAPI(url);
    let cotacaoDia = JSON.parse(data);

    console.log(cotacaoDia.value[0].cotacaoVenda);
    
   return [cotacaoDia.value[0].cotacaoVenda, cotacaoDia.value[0].dataHoraCotacao];
    
   //return cotacaoDia.value[0].cotacaoVenda;
}

function formatDateParaBusca(date, interval){
    
    var data = date;
    var dataMonth = data.getMonth()+1;

    const dataOne = formatDayAndMonth(dataMonth) + "-" + formatDayAndMonth(data.getDate()) + "-" + data.getFullYear();
    
    data.setDate(date.getDate() - interval);
 
    const dataTwo = formatDayAndMonth(dataMonth) + "-" + formatDayAndMonth(data.getDate()) + "-" + data.getFullYear();

    return {begin:dataTwo, end:dataOne};
}

function formatDayAndMonth(value){
    return value<10 ? "0"+value:value;
}

function parseNumberToMonth(value){
    debugger
    let month = value.split("-");
    let Months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", 
                            "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro","Sei la"];
    return Months[parseInt(month[1])-1];
}