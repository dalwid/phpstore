<?php

// coleção de rotas
$rotas = [
    "inicio" => "main@index",
    "loja"   => "main@loja",
    "carrinho" => "loja@carrinho"
];

// define uma ação por padrão
$acao = 'inicio';

// verifica se existe a ação na query string
if(isset($_GET['a'])){
    // verifica se a açã oexiste nas rotas
    if(!key_exists( $_GET['a'], $rotas)){
        $acao = 'inicio';
    }
    else{
        $acao = $_GET['a'];
    }
}

// trata a definição da rota
$partes      = explode('@', $rotas[$acao]);
$controlador = 'core\\controleres\\' . ucfirst($partes[0]);
$metodo      = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();