<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para o menu lateral */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            transition: 0.5s;
        }

        .sidebar a {
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Estilos para o conteúdo à direita do menu */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <div class="sidebar">
        <a href="/produto">Produtos</a>
        <a href="/pedido">Pedidos</a>
    </div>

    <div class="content" id="content">
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
                        <td><?= $item->descricao ?></td>
                        <td>R$ <?= number_format($item->valorVenda, 2, ',', '.') ?></td>
                        <td><?= $item->qtdeEstoque ?> unidades</td>
                        <td>
                            <a href='produto/edit?id=<?= $item->idProduto ?>' class='btn btn-warning'>Editar</a>
                            <a class='btn btn-danger btn-excluir' data-id='<?= $item->idProduto ?>'>Excluir</a>

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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../../assets/sweetalert.js"></script>
    <script>
    const btnExcluir = document.querySelectorAll('.btn-excluir');

    btnExcluir.forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                text: "Tem certeza que desja excluir este produto?",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim'                
            }).then((result) => {
                if (result.isConfirmed) {
            var idProduto = $(this).attr('data-id');
                    $.ajax({
                        type: 'GET', 
                        url: 'produto/delete',
                        data: { id: idProduto },
                        success: function(response) {
                            Swal.fire(
                                'O produto foi excluído com sucesso!'
                            ).then(() => {
                                location.reload(); // Reload após o usuário clicar em "OK"
                            });
                        }
                    });
                }
            });
        });
    });
</script>

</body>
</script>

</html>
