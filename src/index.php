
<?php

require_once('transform.php');  
require_once('extract.php');

session_start(); // Inicia a sessão


// Descomente a linha a baixo para limpar a variavel de sessão
//$_SESSION['value'] = ''; 


$val = [];
    
if(!isset($_SESSION['value']) || empty($_SESSION['value'])){
    // Chama etapa 1 de extract.php:
    extractAPI($val); 
    // Chama etapa 2 de transform.php:
    quickSort($val, 0, array_key_last($val)); 
    // Salva a array dos valores ordenados na sessão
    $_SESSION['value'] = $val;
}


        


