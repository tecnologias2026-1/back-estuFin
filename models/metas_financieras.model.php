<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMetasFinancieras($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM metas_financieras WHERE usuario_email = :email ORDER BY fecha_limite ASC");
    $stmt->execute([':email' => $email]);
    return $stmt->fetchAll();
}

function createMetaFinanciera($data) {
    global $pdo;
    $sql = "INSERT INTO metas_financieras (usuario_email, nombre_meta, monto_objetivo, monto_ahorrado, fecha_limite)
            VALUES (:usuario_email, :nombre_meta, :monto_objetivo, :monto_ahorrado, :fecha_limite)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Meta financiera creada exitosamente"];
}

function updateMetaFinanciera($id, $data) {
    global $pdo;
    $sql = "UPDATE metas_financieras SET nombre_meta = :nombre_meta, monto_objetivo = :monto_objetivo,
            monto_ahorrado = :monto_ahorrado, fecha_limite = :fecha_limite WHERE id = :id";
    $data[':id'] = $id;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    return ["mensaje" => "Meta actualizada exitosamente"];
}

function deleteMetaFinanciera($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM metas_financieras WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return ["mensaje" => "Meta eliminada exitosamente"];
}
?>