<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once __DIR__ . '/../controllers/metas_financieras.controller.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    handleGetAllMetasFinancieras();
} elseif ($method === 'POST') {
    handleCreateMetaFinanciera();
}
?>