<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMovimientos($email) {
    global $pdo;
    $stmt = $pdo->prepare(
        "SELECT * FROM movimientos 
         WHERE usuario_email = :email 
         ORDER BY fecha DESC"
    );
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createMovimiento($data) {
    global $pdo;

    $sql = "INSERT INTO movimientos 
                (usuario_email, tipo, monto, categoria, fecha, metodo_pago, descripcion)
            VALUES 
                (:usuario_email, :tipo, :monto, :categoria, :fecha, :metodo_pago, :descripcion)";

    $stmt = $pdo->prepare($sql);

    // Mapear explícitamente para evitar el bug de claves sin ":"
    $stmt->execute([
        ':usuario_email' => $data['usuario_email'],
        ':tipo'          => $data['tipo'],
        ':monto'         => (float) $data['monto'],
        ':categoria'     => $data['categoria'] ?? 'General',
        ':fecha'         => $data['fecha'],
        ':metodo_pago'   => $data['metodo_pago'],
        ':descripcion'   => $data['descripcion'],
    ]);

    return ["mensaje" => "Movimiento creado exitosamente"];
}
?>