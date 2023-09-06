<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Conteúdo do Cadastro de Produto -->
    <div class="container mt-5">
        <h2>Cadastro de Produto</h2>
        <form action="/produto/save" method="post" enctype="multipart/form-data">

            <!-- <input type="hidden" value="<?= $model->idProduto ?>" name="idProduto" /> -->

            <div class="form-group">
                <label for="idProduto">Código:</label>
                <input type="text" class="form-control" id="idProduto" name="idProduto" value="<?= $model->idProduto ?>" required><!--  -->
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $model->descricao ?>" required><!--  -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="valor_venda">Valor de Venda:</label>
                    <input type="number" class="form-control" id="valor_venda" name="valor_venda" step="0.01" value="<?= $model->valorVenda ?>" required> <!--   -->
                </div>
                <div class="form-group col-md-6">
                    <label for="estoque">Quantidade em Estoque:</label>
                    <input type="number" class="form-control" id="qtdeestoque" name="qtdeestoque" value="<?= $model->qtdeEstoque ?>" required> <!--   -->
                </div>
            </div>
            <div class="form-group">
                <label for="imagens">Upload de Imagens:</label>
                <input type="file" class="form-control-file" id="imagens" name="imagens[]" ><!-- multiple required -->
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
