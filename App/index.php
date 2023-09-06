<?php

include 'Controller/IndexController.php';
include 'Controller/ProdutoController.php';
include 'Controller/PedidoController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        IndexController::index();
    break;

    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;    
    
    case '/produto/edit':
        ProdutoController::edit();
    break;

    case '/produto/delete':
        ProdutoController::delete();
    break;
    
    case '/pedido':
        PedidoController::index();
    break;


    default: 
        echo 'Error 404';
    break;
}
