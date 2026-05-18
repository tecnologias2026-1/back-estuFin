<?php
require_once __DIR__ . '/../models/metas_financieras.model.php';

function handleGetAllMetasFinancieras() {
    $data = getAllMetasFinancieras();
    echo json_encode($data);
}

function handleCreateMetaFinanciera() {
    $input = json_decode(file_get_contents("php://input"), true);
    $result = createMetaFinanciera($input);
    echo json_encode($result);
}
?>