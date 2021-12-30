<?php

function quickSort(&$val, int $inicio, int $fim){

    if($inicio < $fim){
        // Calcula a escolha de pivo
        $pivo = partQuick($val, $inicio, $fim); 

        // Inicia recursividade das sublistas
        quickSort($val, $inicio, $pivo - 1); 
        quickSort($val, $pivo, $fim);
    }
}

function partQuick(&$val, int $esq, int $dir){

    $pivo = $esq + ($dir - $esq) / 2; // Calcula posicao media do vetor
    $valorPivo = $val[$pivo]; // Recebe valor do pivo selecionado

    // Enquanto esquerda nao ultrapassar direita
    while($esq <= $dir){ 

        //Compara pivo com os valores a sua esquerda
        while($val[$esq] < $valorPivo){  
            $esq++;
        }

        //Compara pivo com os valores a sua direita
        while($val[$dir] > $valorPivo){ 
            $dir--;
        }

        // Chama a troca de posicao
        if($esq <= $dir){ 
            $aux = $val[$esq]; // Auxiliar para a troca
            $val[$esq] = $val[$dir];
            $val[$dir] = $aux;
            $esq ++;
            $dir --;
        }
    }
    
    return $esq; // Retorna o novo pivo
} 