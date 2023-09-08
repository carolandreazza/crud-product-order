<?php

class PedidoDAO
{
    private $conn;
    public  function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_livraria";

        $this->conn = new PDO($dsn, 'root', '@MySQLdev2023');
    }

    public function insert(PedidoModel $model)
    {
        $sql = "INSERT INTO pedido (nomeCliente, dataPedido, totalPedido) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $model->nomeCliente);
        $stmt->bindValue(2, $model->dataPedido); 
        $stmt->bindValue(3, $model->totalPedido); 
        $stmt->execute();
        $pedidoId = $this->conn->lastInsertId();
        
        /* var_dump($model); */
        $sql = "INSERT INTO item_pedido (idpedido, idProduto, quantidade) VALUES (?, ?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {           
            foreach ($model->listaProdutos as $item) {
                $produto = $item['idProduto'];
                $quantidade = $item['quantidade'];

                $stmt->bindValue(1, $pedidoId);
                $stmt->bindValue(2, $produto); 
                $stmt->bindValue(3, $quantidade);
                $stmt->execute();
            }
            header("Location: /pedido");
            exit;
        } else {
            echo "Erro ao preparar a consulta de inserção de itens do pedido.";
        }        
    }


    public  function select()
    {
        $sql = "SELECT * FROM pedido ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    }

   /*  public  function selectById(int $id)
    {
        include_once 'Model/PedidoModel.php';

        $sql = "SELECT * FROM pedido WHERE idPedido=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();


        return $stmt->fetchObject("PedidoModel");
        
    } */
    public  function delete(int $id)
    {
        $sql = "DELETE FROM pedido WHERE idpedido=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
    }
}