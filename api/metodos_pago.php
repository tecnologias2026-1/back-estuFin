<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once __DIR__ . '/../controllers/metodos_pago.controller.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    handleGetAllMetodosPago();
} elseif ($method === 'POST') {
    handleCreateMetodoPago();
}
?>