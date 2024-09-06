<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</head>
<style>


body {
  background-image: url(../assets/camilo/Pictures/fondo.jpg);
}

</style>

<body>
<div class="container mt-5">
    <h1 class="text-center my-4 bg-primary text-white border border-dark p-3 " style="border-radius: 30px;">Productos en catálogo</h1>
    <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#Pedido</th>
                    <th>productos</th>
                    <th>valor total</th>
                    <th>fecha pedido</th>
                    <th>cliente</th>
                    <th>id_cliente</th>
                    <th>estado</th>
                </tr>
            </thead>
            <tbody>

    <?php

                    require_once __DIR__ . '/../models/producto.php';
                    require_once __DIR__ . '/../models/database.php';
                    $database = new Database();
                    $dbConnection = $database->conn;

                    $pedidos = Producto::obtenerPedidos($dbConnection);
                    foreach ($pedidos as $pedido) {
                        echo '<tr>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['id_pedido']) . '</td>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['productos']) . '</td>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['valor_total']) . '</td>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['fecha_pedido']) . '</td>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['nombre_cliente']) . '</td>
                            <td class="text-center align-middle">' . htmlspecialchars($pedido['id_cliente']) . '</td>
                            <td class="text-center align-middle"> 
                               <select class="form-select">
                                  <option value="pendiente">Pendiente</option>
                                  <option value="entregado">Entregado</option>
                                  <option value="cancelado">Cancelado</option>
                               </select>
                            </td>
                        </tr>';
                    }
    ?>
                </tbody>
                </table>
            <div class="text-center mt-4">
           <a href="AdminProducto.php" class="btn btn-success btn-lg">volver</a>
        </div>

</body>
</html>