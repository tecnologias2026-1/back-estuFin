<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMetodosPago($email) {
    global $pdo;
    $stmt = $pdo->prepare(
        "SELECT id, usuario_email, nombre_metodo, 
                CAST(saldo AS FLOAT) as saldo, created_at
         FROM metodos_pago 
         WHERE usuario_email = :email 
         ORDER BY id ASC"
    );
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createMetodoPago($data) {
    global $pdo;

    $stmt = $pdo->prepare(
        "INSERT INTO metodos_pago (usuario_email, nombre_metodo, saldo)
         VALUES (:usuario_email, :nombre_metodo, :saldo)"
    );

    $stmt->execute([
        ':usuario_email'  => $data['usuario_email'],
        ':nombre_metodo'  => $data['nombre_metodo'],
        ':saldo'          => (float) $data['saldo'],
    ]);

    return ["mensaje" => "Método de pago creado exitosamente"];
}

function updateMetodoPago($id, $saldo) {
    global $pdo;

    $stmt = $pdo->prepare(
        "UPDATE metodos_pago SET saldo = :saldo WHERE id = :id"
    );

    $stmt->execute([
        ':saldo' => (float) $saldo,
        ':id'    => (int) $id,
    ]);

    return ["mensaje" => "Saldo actualizado"];
}

function deleteMetodoPago($id) {
    global $pdo;

    $stmt = $pdo->prepare(
        "DELETE FROM metodos_pago WHERE id = :id"
    );

    $stmt->execute([':id' => (int) $id]);

    return ["mensaje" => "Método eliminado"];
}
?>