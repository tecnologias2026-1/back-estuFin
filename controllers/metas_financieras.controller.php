<?php
require_once __DIR__ . '/../models/metas_financieras.model.php';

function handleGetAllMetasFinancieras() {
    $email = $_GET['email'] ?? '';
    $data = getAllMetasFinancieras($email);
    echo json_encode($data);
}

function handleCreateMetaFinanciera() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createMetaFinanciera($input);
    echo json_encode($result);
}

function handleUpdateMetaFinanciera() {
    $input = json_decode(file_get_contents("php://input"), true);
    $id = $input['id'];
    unset($input['id']);
    $result = updateMetaFinanciera($id, $input);
    echo json_encode($result);
}

function handleDeleteMetaFinanciera() {
    $id = $_GET['id'] ?? null;
    $result = deleteMetaFinanciera($id);
    echo json_encode($result);
}
?>