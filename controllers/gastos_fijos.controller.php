<?php
require_once __DIR__ . '/../models/gastos_fijos.model.php';

function handleGetGastosFijos() {
    $email = $_GET['email'] ?? '';
    if (!$email) {
        http_response_code(400);
        echo json_encode(["error" => "Email requerido"]);
        return;
    }
    echo json_encode(getAllGastosFijos($email));
}

function handleCreateGastoFijo() {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['usuario_email'], $input['nombre'], $input['monto'], $input['metodo_pago'])) {
        http_response_code(400);
        echo json_encode(["error" => "Datos incompletos"]);
        return;
    }
    http_response_code(201);
    echo json_encode(createGastoFijo($input));
}

function handleDeleteGastoFijo() {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => "id requerido"]);
        return;
    }
    echo json_encode(deleteGastoFijo((int)$id));
}