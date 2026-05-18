<?php
require_once __DIR__ . '/../models/metodos_pago.model.php';

function handleGetAllMetodosPago() {
    $data = getAllMetodosPago();
    echo json_encode($data);
}

function handleCreateMetodoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createMetodoPago($input);
    echo json_encode($result);
}
?>