<!-- <!DOCTYPE html>
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
        <form action="processar_cadastro_pedido.php" method="post">
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <input type="text" class="form-control" id="cliente" name="cliente" required>
            </div>
            <div class="form-group">
                <label for="produtos">Produtos:</label>
                <select class="form-control" id="produtos" name="produtos[]" multiple required>
                    <option value="produto1">Produto 1</option>
                    <option value="produto2">Produto 2</option>
                    <option value="produto3">Produto 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidades">Quantidades:</label>
                <input type="number" class="form-control" id="quantidades" name="quantidades[]" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Pedido</button>
            <a href="/" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
 -->
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
        <form action="processar_pedido.php" method="post">
            <div class="form-group">
                <label for="cliente">Nome do Cliente:</label>
                <input type="text" class="form-control" id="cliente" name="cliente" required>
            </div>
            <div class="form-group">
                <label for="produto">Produto:</label>
                <select class="form-control" id="produto">
                    <option value="produto1">Produto 1</option>
                    <option value="produto2">Produto 2</option>
                    <option value="produto3">Produto 3</option>
                    <!-- Adicione mais opções conforme necessário -->
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" min="1" required>
            </div>
            <button type="button" class="btn btn-primary" id="adicionarProduto">Adicionar Produto</button>

            <!-- Grid para mostrar os produtos adicionados -->
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="listaProdutos">
                    <!-- Aqui serão exibidos os produtos adicionados -->
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Finalizar Pedido</button>
            <a href="/" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Função para adicionar produtos ao grid
        $(document).ready(function () {
            $("#adicionarProduto").click(function () {
                var produto = $("#produto option:selected").text();
                var quantidade = $("#quantidade").val();
                if (quantidade > 0) {
                    $("#listaProdutos").append("<tr><td>" + produto + "</td><td>" + quantidade + "</td><td><button class='btn btn-danger btn-sm removerProduto'>Remover</button></td></tr>");
                }
                $("#produto").val("");
                $("#quantidade").val("");
            });

            // Função para remover produtos do grid
            $(document).on("click", ".removerProduto", function () {
                $(this).closest("tr").remove();
            });
        });
    </script>
</body>
</html>
