<?php
require_once __DIR__ . '/../database/connection.php';

function getAllMetasFinancieras() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM metas_financieras");
    $stmt->execute();
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
?>