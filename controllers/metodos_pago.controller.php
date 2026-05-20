<?php
require_once __DIR__ . '/../models/metodos_pago.model.php';

function handleGetAllMetodosPago() {
    $email = $_GET['email'] ?? '';
    if (!$email) {
        http_response_code(400);
        echo json_encode(["error" => "Email requerido"]);
        return;
    }
    $data = getAllMetodosPago($email);
    echo json_encode($data);
}

function handleCreateMetodoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['usuario_email'], $input['nombre_metodo'], $input['saldo'])) {
        http_response_code(400);
        echo json_encode(["error" => "Datos incompletos"]);
        return;
    }
    $result = createMetodoPago($input);
    http_response_code(201);
    echo json_encode($result);
}

function handleUpdateMetodoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['id'], $input['saldo'])) {
        http_response_code(400);
        echo json_encode(["error" => "id y saldo requeridos"]);
        return;
    }
    $result = updateMetodoPago((int)$input['id'], (float)$input['saldo']);
    echo json_encode($result);
}

function handleDeleteMetodoPago() {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => "id requerido"]);
        return;
    }
    $result = deleteMetodoPago((int)$id);
    echo json_encode($result);
}