<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Listagem de Pedidos</h2>
        <a href="View/modules/Pedido/CreatePedido.php" class="btn btn-primary">Novo Pedido</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Cliente</th>
                    <th>Data do Pedido</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Aqui você deve recuperar os pedidos do banco de dados e iterar sobre eles
                // Substitua este loop pelo código PHP real
                for ($i = 1; $i <= 5; $i++) {
                    echo "<tr>
                            <td>{$i}</td>
                            <td>Cliente {$i}</td>
                            <td>2023-09-05</td>
                            <td>
                                <a href='excluir_pedido.php?id={$i}' class='btn btn-danger'>Excluir</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
