<?php

class PedidoModel
{
    public $idPedido, $nomeCliente, $dataPedido, $totalPedido, $listaProdutos;
    public $rows;

    public function save()
    {

        include 'DAO/PedidoDAO.php';

        $dao = new PedidoDAO();

        $dao->insert($this);
        
    }

    public function getAllRows()
    {

        include 'DAO/PedidoDAO.php';

        $dao = new PedidoDAO();

        $this->rows = $dao->select();

    }

   /*  public function getById(int $id)
    {

        include 'DAO/PedidoDAO.php';

        $dao = new PedidoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PedidoModel();
    } */
    
    public function delete(int $id)
    {
        include 'DAO/PedidoDAO.php';

        $dao = new PedidoDAO();

        $dao->delete($id);
    }
}