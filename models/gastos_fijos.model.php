<?php
require_once __DIR__ . '/../database/connection.php';

function getAllGastosFijos($email) {
    global $pdo;
    $stmt = $pdo->prepare(
        "SELECT * FROM gastos_fijos 
         WHERE usuario_email = :email 
         ORDER BY created_at DESC"
    );
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createGastoFijo($data) {
    global $pdo;
    $stmt = $pdo->prepare(
        "INSERT INTO gastos_fijos (usuario_email, nombre, monto, metodo_pago)
         VALUES (:usuario_email, :nombre, :monto, :metodo_pago)"
    );
    $stmt->execute([
        ':usuario_email' => $data['usuario_email'],
        ':nombre'        => $data['nombre'],
        ':monto'         => (float) $data['monto'],
        ':metodo_pago'   => $data['metodo_pago'],
    ]);
    return ["mensaje" => "Gasto fijo creado exitosamente"];
}

function deleteGastoFijo($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM gastos_fijos WHERE id = :id");
    $stmt->execute([':id' => (int) $id]);
    return ["mensaje" => "Gasto fijo eliminado"];
}