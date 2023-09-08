<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Pedidos</title>
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
            <h2>Listagem de Pedidos</h2>
            <a href="pedido/new" class="btn btn-primary">Novo Pedido</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID do Pedido</th>
                        <th>Cliente</th>
                        <th>Data do Pedido</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($model) && !empty($model->rows)): ?>
                    <?php foreach ($model->rows as $item): ?>
                    <tr>
                        <td><?= $item->idpedido ?></td>
                        <td><?= $item->nomeCliente ?></td>
                        <td><?= $item->dataPedido  ?></td>
                        <td>R$ <?= number_format($item->totalPedido, 2, ',', '.') ?></td>
                        <td>
                            <a class='btn btn-danger btn-excluir' data-id='<?= $item->idpedido ?>'>Excluir</a>

                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum pedido encontrado.</td>
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
                text: "Tem certeza que desja excluir este pedido?",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim'                
            }).then((result) => {
                if (result.isConfirmed) {
            var idPedido = $(this).attr('data-id');
                    $.ajax({
                        type: 'GET', 
                        url: 'pedido/delete',
                        data: { id: idPedido },
                        success: function(response) {
                            Swal.fire(
                                'O pedido foi excluído com sucesso!'
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
</html>
