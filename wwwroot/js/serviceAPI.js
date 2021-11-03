  //API key c81746093340efadbff43b54
function fazGetAPI(url){
    let request = new XMLHttpRequest(url);
    request.open("GET", url, false);
    request.send()
    return request.responseText
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