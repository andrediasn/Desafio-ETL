<?php

// Carrega API externa
function extractAPI(&$val){
    $page = 1; // Define a pagina inicial do loop

    while(true){
        // define a url com a pagina do endpoint
        $url = "http://challenge.dienekes.com.br/api/numbers?page=".$page;
        // Consome a api do endpoint definido acima
        $result = urlGetContent($url);
        // O loop abaixo serve para contornar qualquer falha na requisicao
        
        while(is_null($result)){
            // Reenvia a requisicao
            $result = urlGetContent($url);
        }

        // Salva o novo conteudo no fim da array
        $val = [...$val, ...$result];
        // atualizo $page para pagina seguinte
        $page++;
        // Se o retorno for vazio, encerra.

        if(empty($result)){
            break;
        }
    }
}

function urlGetContent($url){
    // Consome a api utilizando metodo curl
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    // decode do retorno em json
    $output = json_decode(curl_exec($ch));
    // Salva informacao de sucesso ou falha da requisicao
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200) {
        // Se foi bem sucedido, retorna array de valores
        return $output->numbers;
    }
    else{
        // Caso aconteça um falha na requisicao, retorna null
        return null; 
    }
}
 