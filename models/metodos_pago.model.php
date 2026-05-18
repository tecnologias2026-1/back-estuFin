<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMetodosPago($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM metodos_pago WHERE usuario_email = :email ORDER BY created_at DESC");
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createMetodoPago($data) {
    global $pdo;
    $sql = "INSERT INTO metodos_pago (usuario_email, nombre_metodo, saldo)
            VALUES (:usuario_email, :nombre_metodo, :saldo)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Método de pago creado exitosamente"];
}

function updateMetodoPago($id, $saldo) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE metodos_pago SET saldo = :saldo WHERE id = :id");
    $stmt->execute([':saldo' => $saldo, ':id' => $id]);
    return ["mensaje" => "Saldo actualizado"];
}

function deleteMetodoPago($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM metodos_pago WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return ["mensaje" => "Método eliminado"];
}
?>