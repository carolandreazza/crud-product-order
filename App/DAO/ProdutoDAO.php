<?php

class ProdutoDAO
{
    private $conn;
    public  function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=db_livraria";

        $this->conn = new PDO($dsn, 'root', '@MySQLdev2023');
    }

    public  function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO produto (idProduto, descricao, valorVenda, qtdeEstoque) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $model->idProduto);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->valorVenda);
        $stmt->bindValue(4, $model->qtdeEstoque);
        $stmt->execute();
        
        if($stmt->rowCount()) {
            $produto_id = $this->conn->lastInsertId();
            $diretorio = "imagens/$produto_id/";
            mkdir($diretorio, 0755);

            $arquivo = $model->imagens;

            for($cont = 0; $cont < count($arquivo['name']); $cont++) {
                $nome_arquivo = $arquivo['name'][$cont];
                $destino = $diretorio . $arquivo['name'][$cont];
                if(move_uploaded_file($arquivo['tmp_name'][$cont], $destino)){
                    $sql = "INSERT INTO imagem (nomeImagem, idProduto) VALUES (?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindValue(1, $nome_arquivo);
                    $stmt->bindValue(2, $produto_id);
                    $stmt->execute();
                } else {
                    var_dump('imagem não ok');
                }
            }
        }


        header("Location: /produto");
    }

    public  function update(ProdutoModel $model)
    {        
        $sql = "UPDATE produto SET descricao=?, valorVenda=?, qtdeEstoque=? WHERE idProduto=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valorVenda);
        $stmt->bindValue(3, $model->qtdeEstoque);
        $stmt->bindValue(4, $model->idProduto);
        $stmt->execute();
        
        if($stmt->rowCount()) {
            $diretorio = "imagens/$model->idProduto/";
            mkdir($diretorio, 0755);

            $arquivo = $model->imagens;

            for($cont = 0; $cont < count($arquivo['name']); $cont++) {
                $nome_arquivo = $arquivo['name'][$cont];
                $destino = $diretorio . $arquivo['name'][$cont];
                if(move_uploaded_file($arquivo['tmp_name'][$cont], $destino)){
                    $sql = "INSERT INTO imagem (nomeImagem, idProduto) VALUES (?, ?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindValue(1, $nome_arquivo);
                    $stmt->bindValue(2, $model->idProduto);
                    $stmt->execute();
                } else {
                    var_dump('imagem não ok');
                }
            }
        }

        header("Location: /produto");
    }

    public  function select()
    {
        $sql = "SELECT * FROM produto ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_CLASS);
        
    }

    public  function selectById(int $id)
    {
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produto WHERE idProduto=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();


        return $stmt->fetchObject("ProdutoModel");
        
    }
    public  function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE idProduto=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
    }
}