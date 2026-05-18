<?php
require_once __DIR__ . '/../database/connection.php';

function getAllProximosPagos($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM proximos_pagos WHERE usuario_email = :email ORDER BY fecha_vencimiento ASC");
    $stmt->execute([':email' => $email]);
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

function updateProximoPago($id, $data) {
    global $pdo;
    $sql = "UPDATE proximos_pagos SET nombre_pago = :nombre_pago, monto = :monto,
            fecha_vencimiento = :fecha_vencimiento, estado = :estado,
            es_recurrente = :es_recurrente WHERE id = :id";
    $data[':id'] = $id;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Pago actualizado exitosamente"];
}

function marcarComoPagado($id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE proximos_pagos SET estado = 'pagado' WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return ["mensaje" => "Pago marcado como pagado"];
}

function deleteProximoPago($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM proximos_pagos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return ["mensaje" => "Pago eliminado exitosamente"];
}
?>