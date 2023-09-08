
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Pedido</h2>
        <form action="/pedido/save" method="post">

        <input type="hidden" id="listaProdutosInput" name="listaProdutos" value="">
        <!-- <input type="hidden" id="listaProd" name="listaProd"> -->
        <input type="hidden" id="totalPedido" name="totalPedido">

            <div class="form-group">
                <label for="nomeCliente">Nome do Cliente:</label>
                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
            </div>
            <div class="form-group">
                <label for="produto">Produto:</label>
                <select class="form-control" name="produto" id="produto">
                    <?php if (isset($model) && !empty($model->rows)): ?>
                    <?php foreach ($model->rows as $item): ?>
                        <option value=<?= $item->idProduto ?>><?= $item->idProduto ?> - <?= $item->descricao ?> - R$ <?= number_format($item->valorVenda, 2, ',', '.') ?></option>
                    <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Nenhum produto encontrado.</td>
                        </tr>
                    <?php endif ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" min="1">
            </div>
            <button type="button" class="btn btn-primary" id="adicionarProduto">Adicionar Produto</button>
            <div class="form-row">
                
            </div>
            <!-- Grid para mostrar os produtos adicionados -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="listaProdutos">
                    <!-- Aqui serão exibidos os produtos adicionados -->
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Finalizar Pedido</button>
            <a href="/pedido" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Função para adicionar produtos ao grid
        var listaProdutos = [];
        /* var listaProd = []; */
        var totalPedido = 0;
        $(document).ready(function () {
            $("#adicionarProduto").click(function () {
                var produto = $("#produto option:selected").text();
                /* var quantidade = $("#quantidade").val(); */
                var quantidade = parseInt($("#quantidade").val());
                var posicaoR = produto.indexOf("R$");
                var valorItem = parseFloat(produto.substring(posicaoR + 2));
                var total = isNaN(valorItem) || isNaN(quantidade) ? 0 : valorItem * quantidade;
                if (quantidade > 0) {
                    $("#listaProdutos").append("<tr><td>" + produto + "</td><td>" + quantidade + "</td><td>" + "R$" + total.toFixed(2) + "</td><td><button class='btn btn-danger btn-sm removerProduto'>Remover</button></td></tr>");                    
                    listaProdutos.push({ produto: produto.split(' ')[0], quantidade: quantidade, total:total });
                    $("#listaProdutosInput").val(JSON.stringify(listaProdutos));
                    totalPedido += total;
                    /* $("#listaProd").val(listaProd); */
                    $("#totalPedido").val(totalPedido.toFixed(2));
                }
                $("#produto").val("");
                $("#quantidade").val("");
                $("#total").val("");
            });

            // Função para remover produtos do grid
            $(document).on("click", ".removerProduto", function () {
                $(this).closest("tr").remove();
            });
        });
    </script>
</body>
</html>
