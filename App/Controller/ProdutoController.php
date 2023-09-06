<?php

class ProdutoController
{
    public static function index()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->getAllRows();
        

        include 'View/modules/Produto/ListProduto.php';
    }

    public static function edit()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        if(isset($_GET['id']))
                $model = $model->getById((int) $_GET['id']);
    /* var_dump($model); */
        include 'View/modules/Produto/CreateProduto.php';
    }
    
    public static function save()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->idProduto =  $_POST['idProduto'];
        $model->descricao = $_POST['descricao'];
        $model->valorVenda = $_POST['valor_venda'];
        $model->qtdeEstoque = $_POST['qtdeestoque'];
        $model->imagens = '';/* $_POST['imagens'] */;       

        $model->save();

        header("Location: /");
    }


    public static function delete()
    {
        include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /"); 
    }
}