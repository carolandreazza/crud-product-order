<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
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
        <!-- <a href="#" onclick="loadContent('/produto')">Produtos</a>
        <a href="#" onclick="loadContent('/pedido')">Pedidos</a> -->
    </div>

    <!-- Conteúdo -->
    <div class="content" id="content">
        <h1>Bem-vindo ao sistema da Livraria</h1>
        <p>Escolha uma opção no menu lateral para ver a lista de produtos ou pedidos.</p>
    </div>
    
</body>
</html>
