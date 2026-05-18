<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMovimientos() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM movimientos ORDER BY fecha DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function createMovimiento($data) {
    global $pdo;
    $sql = "INSERT INTO movimientos (usuario_email, tipo, monto, categoria, fecha, metodo_pago, descripcion)
            VALUES (:usuario_email, :tipo, :monto, :categoria, :fecha, :metodo_pago, :descripcion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Movimiento creado exitosamente"];
}
?>