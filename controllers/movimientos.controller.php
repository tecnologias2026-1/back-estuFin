<?php
require_once __DIR__ . '/../models/movimientos.model.php';

function handleGetAllMovimientos() {
    $email = $_GET['email'] ?? '';
    $data = getAllMovimientos($email);
    echo json_encode($data);
}

function handleCreateMovimiento() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createMovimiento($input);
    echo json_encode($result);
}
?>