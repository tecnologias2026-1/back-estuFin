<?php
require_once __DIR__ . '/../database/connection.php';

function getAllGastosRapidos($email) {
    global $pdo;
    $stmt = $pdo->prepare(
        "SELECT * FROM gastos_rapidos WHERE usuario_email = :email ORDER BY created_at DESC"
    );
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createGastoRapido($data) {
    global $pdo;
    $stmt = $pdo->prepare(
        "INSERT INTO gastos_rapidos (usuario_email, nombre, monto, categoria, metodo_pago)
         VALUES (:usuario_email, :nombre, :monto, :categoria, :metodo_pago)"
    );
    $stmt->execute([
        ':usuario_email' => $data['usuario_email'],
        ':nombre'        => $data['nombre'],
        ':monto'         => (float) $data['monto'],
        ':categoria'     => $data['categoria'],
        ':metodo_pago'   => $data['metodo_pago'],
    ]);
    return ["mensaje" => "Gasto rápido creado exitosamente"];
}

function updateGastoRapido($id, $data) {
    global $pdo;
    $stmt = $pdo->prepare(
        "UPDATE gastos_rapidos SET nombre = :nombre, monto = :monto,
         categoria = :categoria, metodo_pago = :metodo_pago WHERE id = :id"
    );
    $stmt->execute([
        ':nombre'      => $data['nombre'],
        ':monto'       => (float) $data['monto'],
        ':categoria'   => $data['categoria'],
        ':metodo_pago' => $data['metodo_pago'],
        ':id'          => $id,
    ]);
    return ["mensaje" => "Gasto rápido actualizado"];
}

function deleteGastoRapido($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM gastos_rapidos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return ["mensaje" => "Gasto rápido eliminado"];
}
?>