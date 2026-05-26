<?php
ini_set('display_errors', 0);
error_reporting(0);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../controllers/gastos_rapidos.controller.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':    handleGetGastosRapidos();    break;
    case 'POST':   handleCreateGastoRapido();   break;
    case 'PUT':    handleUpdateGastoRapido();   break;
    case 'DELETE': handleDeleteGastoRapido();   break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
}
?>