<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMovimientos($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM movimientos WHERE usuario_email = :email ORDER BY fecha DESC");
    $stmt->execute([':email' => $email]);
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