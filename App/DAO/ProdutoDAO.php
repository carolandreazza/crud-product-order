<?php

class ProdutoDAO
{
    private $connection;
    public  function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_livraria";

        $this->connection = new PDO($dsn, 'root', '@MySQLdev2023');
    }

    public  function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO produto (idProduto, descricao, valorVenda, qtdeEstoque, imagens) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->idProduto);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->valorVenda);
        $stmt->bindValue(4, $model->qtdeEstoque);
        $stmt->bindValue(5, $model->imagens);
        $stmt->execute();

        header("Location: /");
    }

    public  function update(ProdutoModel $model)
    {        
        $sql = "UPDATE produto SET descricao=?, valorVenda=?, qtdeEstoque=?, imagens=? WHERE idProduto=? ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valorVenda);
        $stmt->bindValue(3, $model->qtdeEstoque);
        $stmt->bindValue(4, $model->imagens);
        $stmt->bindValue(5, $model->idProduto);
        $stmt->execute();

        header("Location: /");
    }

    public  function select()
    {
        $sql = "SELECT * FROM produto ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    }

    public  function selectById(int $id)
    {
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produto WHERE idProduto=? ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();


        return $stmt->fetchObject("ProdutoModel");
        
    }
    public  function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE idProduto=? ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
    }
}