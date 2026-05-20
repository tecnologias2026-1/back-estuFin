<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../controllers/gastos_fijos.controller.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':    handleGetGastosFijos();    break;
    case 'POST':   handleCreateGastoFijo();   break;
    case 'DELETE': handleDeleteGastoFijo();   break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
}