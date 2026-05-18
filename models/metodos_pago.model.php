<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMetodosPago() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM metodos_pago ORDER BY created_at DESC");
    $stmt->execute();
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
?>