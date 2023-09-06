<?php

class ProdutoModel
{
    public $idProduto, $descricao, $valorVenda, $qtdeEstoque, $imagens;
    public $rows;

    public function save()
    {

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($this->idProduto);
        /* var_dump($obj);
        var_dump($this);
        exit; */

        if(!$obj)
        {
            $dao->insert($this);
        } else
        {
            $dao->update($this);
        }

        
    }

    public function getAllRows()
    {

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $this->rows = $dao->select();

    }

    public function getById(int $id)
    {

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new ProdutoModel();

        /* if($obj)
        {
            return $obj;
        } else
        {
            return new ProdutoModel();
        } */

    }
    
    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}