<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Listagem de Produtos</h2>
        <a href="produto/edit" class="btn btn-primary">Novo Produto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Valor Venda</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($model) && !empty($model->rows)): ?>
                <?php foreach ($model->rows as $item): ?>
                <tr>
                    <td><?= $item->idProduto ?></td>
                    <td>Produto <?= $item->descricao ?></td>
                    <td>R$ <?= number_format($item->valorVenda, 2, ',', '.') ?></td>
                    <td><?= $item->qtdeEstoque ?> unidades</td>
                    <td>
                        <a href='produto/edit?id=<?= $item->idProduto ?>' class='btn btn-warning'>Editar</a>
                        <a href='produto/delete?id=<?= $item->idProduto ?>' class='btn btn-danger'>Excluir</a>
                    </td>
                </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum produto encontrado.</td>
                </tr>
            <?php endif ?>
        </tbody>

        </table>
    </div>
</body>
</html>
