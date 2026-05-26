<?php
require_once __DIR__ . '/../models/gastos_rapidos.model.php';

function handleGetGastosRapidos() {
    $email = $_GET['email'] ?? '';
    if (!$email) { http_response_code(400); echo json_encode(["error" => "Email requerido"]); return; }
    echo json_encode(getAllGastosRapidos($email));
}

function handleCreateGastoRapido() {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['usuario_email'], $input['nombre'], $input['monto'], $input['categoria'], $input['metodo_pago'])) {
        http_response_code(400); echo json_encode(["error" => "Datos incompletos"]); return;
    }
    http_response_code(201);
    echo json_encode(createGastoRapido($input));
}

function handleUpdateGastoRapido() {
    $input = json_decode(file_get_contents("php://input"), true);
    $id = $input['id'];
    unset($input['id']);
    echo json_encode(updateGastoRapido($id, $input));
}

function handleDeleteGastoRapido() {
    $id = $_GET['id'] ?? null;
    if (!$id) { http_response_code(400); echo json_encode(["error" => "id requerido"]); return; }
    echo json_encode(deleteGastoRapido((int)$id));
}
?>