<?php
require_once __DIR__ . '/../models/movimientos.model.php';

function handleGetAllMovimientos() {
    $email = $_GET['email'] ?? '';
    if (!$email) {
        http_response_code(400);
        echo json_encode(["error" => "Email requerido"]);
        return;
    }
    $data = getAllMovimientos($email);
    echo json_encode($data);
}

function handleCreateMovimiento() {
    $input = json_decode(file_get_contents("php://input"), true);
    $required = ['usuario_email', 'tipo', 'monto', 'categoria', 'fecha', 'metodo_pago', 'descripcion'];
    foreach ($required as $field) {
        if (!isset($input[$field])) {
            http_response_code(400);
            echo json_encode(["error" => "Campo requerido: $field"]);
            return;
        }
    }
    $result = createMovimiento($input);
    http_response_code(201);
    echo json_encode($result);
}