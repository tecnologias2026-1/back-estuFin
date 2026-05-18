<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../controllers/metodos_pago.controller.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET')    handleGetAllMetodosPago();
elseif ($method === 'POST')   handleCreateMetodoPago();
elseif ($method === 'PUT')    handleUpdateMetodoPago();
elseif ($method === 'DELETE') handleDeleteMetodoPago();
?>