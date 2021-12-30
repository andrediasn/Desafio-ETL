<?php

// Inicia o sistema
require_once('index.php'); 

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get') {
    // Carrega array da variavel de sessão
    $array = $_SESSION['value'];
} else {
    $array['error'] = 'Metodo nao permitido (apenas GET)';
} 


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

echo json_encode($array);