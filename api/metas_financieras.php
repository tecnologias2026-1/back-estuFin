<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../controllers/metas_financieras.controller.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET')         handleGetAllMetasFinancieras();
elseif ($method === 'POST')    handleCreateMetaFinanciera();
elseif ($method === 'PUT')     handleUpdateMetaFinanciera();
elseif ($method === 'DELETE')  handleDeleteMetaFinanciera();
?>