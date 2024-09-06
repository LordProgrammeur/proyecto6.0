<?php

require_once 'database.php';

class Catalogo {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function guardarPedido($pedido, $valorTotal, $persona) {
        $sql = "INSERT INTO pedidos (productos, valor_total, id_cliente) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die('Error en la preparaci n de la consulta: ' . $this->conn->error);
        }

        $stmt->bind_param('sds', $pedido, $valorTotal, $persona);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
