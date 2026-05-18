<?php
require_once __DIR__ . '/../database/connection.php';

function getAllProximosPagos() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM proximos_pagos ORDER BY fecha_vencimiento ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function createProximoPago($data) {
    global $pdo;
    $sql = "INSERT INTO proximos_pagos (usuario_email, nombre_pago, monto, fecha_vencimiento, estado, es_recurrente)
            VALUES (:usuario_email, :nombre_pago, :monto, :fecha_vencimiento, :estado, :es_recurrente)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Próximo pago creado exitosamente"];
}
?>