<?php
require_once __DIR__ . '/../models/proximos_pagos.model.php';

function handleGetAllProximosPagos() {
    $data = getAllProximosPagos();
    echo json_encode($data);
}

function handleCreateProximoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createProximoPago($input);
    echo json_encode($result);
}
?>