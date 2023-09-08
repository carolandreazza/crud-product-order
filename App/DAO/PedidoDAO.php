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
        
        if($stmt->rowCount()) {
            $pedido_id = $this->conn->lastInsertId();
            
             foreach ($model->listaProdutos as $item) {
                $produto = $item['produto'];
                $quantidade = $item['quantidade'];
                
                $sql = "INSERT INTO item_pedido (idPedido, idProduto, quantidade) VALUES (?, ?, ?)";
                try {
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindValue(1, $pedido_id);
                    $stmt->bindValue(2, $produto); 
                    $stmt->bindValue(3, $quantidade);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "Erro na execução do SQL: " . $e->getMessage();
                }
            }           
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

    public  function delete(int $id)
    {
        $sql = "DELETE FROM pedido WHERE idpedido=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
    }
}