<?php
require_once __DIR__ . '/../models/metodos_pago.model.php';

function handleGetAllMetodosPago() {
    $email = $_GET['email'] ?? '';
    $data = getAllMetodosPago($email);
    echo json_encode($data);
}

function handleCreateMetodoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createMetodoPago($input);
    echo json_encode($result);
}

function handleUpdateMetodoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = updateMetodoPago($input['id'], $input['saldo']);
    echo json_encode($result);
}

function handleDeleteMetodoPago() {
    $id = $_GET['id'] ?? null;
    $result = deleteMetodoPago($id);
    echo json_encode($result);
}
?>