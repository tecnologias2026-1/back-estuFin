<?php
require_once __DIR__ . '/../models/proximos_pagos.model.php';

function handleGetAllProximosPagos() {
    $email = $_GET['email'] ?? '';
    $data = getAllProximosPagos($email);
    echo json_encode($data);
}

function handleCreateProximoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createProximoPago($input);
    echo json_encode($result);
}

function handleUpdateProximoPago() {
    $input = json_decode(file_get_contents("php://input"), true);
    $id = $input['id'];
    unset($input['id']);
    $result = updateProximoPago($id, $input);
    echo json_encode($result);
}

function handleMarcarComoPagado() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = marcarComoPagado($input['id']);
    echo json_encode($result);
}

function handleDeleteProximoPago() {
    $id = $_GET['id'] ?? null;
    $result = deleteProximoPago($id);
    echo json_encode($result);
}
?>