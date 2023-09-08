# CRUD Product Order

**PHP CRUD for Products and Orders**

**Technologies Used:**
- PHP
- MySQL Workbench
- MVC Pattern
- Bootstrap

**Structure:**
- **Controller**
    - IndexController
    - PedidoController
    - ProdutoController
- **Model**
    - PedidoModel
    - ProdutoModel
- **DAO (Data Access Object)** - Layer that connects to the database
    - PedidoDAO
    - ProdutoDAO
- **View**
    - **Modules**
        - **Produtos (Products)**
            - CreateProduto
            - ListProduto
        - **Pedidos (Orders)**
            - CreatePedido
            - ListPedido

**Product Management:**
1. List all products.
2. 'Product Registration' button.
3. 'Edit' and 'Delete' buttons in each row of the product listing.
4. Registration screen with the following information: ID, Description, Sale Price, Stock, Images.
5. Product edit screen.
6. SweetAlert instead of a page.
7. Image upload: after registering a product, you can add one or more photos for the same product.

**Order Management:**

8. Orders screen: list all orders.
9. 'Create Order' button.
10. 'Delete' button in each order row in the order listing.
11. New order screen: you can add one or more products with quantities.
12. SweetAlert for order deletion.
