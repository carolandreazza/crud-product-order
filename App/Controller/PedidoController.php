<?php

class PedidoController
{
    public static function index()
    {
        include 'Model/PedidoModel.php';

        $model = new PedidoModel();
        $model->getAllRows();
        
        include 'View/modules/Pedido/ListPedido.php';
    }
    
    public static function products()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->getAllRows();
        
        include 'View/modules/Pedido/CreatePedido.php';
    }
    
    public static function save()
    {
        include 'Model/PedidoModel.php';

        $model = new PedidoModel();
        $model->nomeCliente = $_POST['nomeCliente'];
        $dataAtual = date('Y-m-d'); 
        $model->dataPedido = $dataAtual;   
        $model->totalPedido = $_POST['totalPedido'];   
        $listaProdutosJSON = $_POST['listaProdutos'];
        $model->listaProdutos = json_decode($listaProdutosJSON, true);
    
        $model->save();

        header("Location: /pedido");
    }


    public static function delete()
    {
        include 'Model/PedidoModel.php'; 

        $model = new PedidoModel();
        
        $model->delete( (int) $_GET['id'] ); 

        header("Location: /pedido"); 
    }
}