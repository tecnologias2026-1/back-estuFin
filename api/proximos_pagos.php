<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../controllers/proximos_pagos.controller.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

if ($method === 'GET')              handleGetAllProximosPagos();
elseif ($method === 'POST' && $action === 'pagar') handleMarcarComoPagado();
elseif ($method === 'POST')         handleCreateProximoPago();
elseif ($method === 'PUT')          handleUpdateProximoPago();
elseif ($method === 'DELETE')       handleDeleteProximoPago();
?>