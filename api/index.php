<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Quitar prefijo /back-estuFin/api o /api
$path = preg_replace('#^(/back-estuFin)?/api#', '', $path);
if ($path === '' || $path === null) $path = '/';

// ── Enrutador ─────────────────────────────────────────────
if (strpos($path, '/usuarios') === 0) {
    require_once 'routes/user.routes.php';
    handleUserRoutes($method, $path);

} elseif (strpos($path, '/gastos_fijos') === 0) {
    require_once 'controllers/gastos_fijos.controller.php';
    switch ($method) {
        case 'GET':    handleGetGastosFijos();    break;
        case 'POST':   handleCreateGastoFijo();   break;
        case 'DELETE': handleDeleteGastoFijo();   break;
        default: http_response_code(405); echo json_encode(['error' => 'Método no permitido']);
}

} elseif (strpos($path, '/usuarios') === 0) {
    require_once 'controllers/user.controller.php';
  

} elseif (strpos($path, '/metodos_pago') === 0) {
    require_once 'controllers/metodos_pago.controller.php';
    switch ($method) {
        case 'GET':    handleGetAllMetodosPago();    break;
        case 'POST':   handleCreateMetodoPago();     break;
        case 'PUT':    handleUpdateMetodoPago();     break;
        case 'DELETE': handleDeleteMetodoPago();     break;
        default: http_response_code(405); echo json_encode(['error' => 'Método no permitido']);
    }

} elseif (strpos($path, '/movimientos') === 0) {
    require_once 'controllers/movimientos.controller.php';
    switch ($method) {
        case 'GET':  handleGetAllMovimientos();  break;
        case 'POST': handleCreateMovimiento();   break;
        default: http_response_code(405); echo json_encode(['error' => 'Método no permitido']);
    }

} elseif ($path === '/') {
    http_response_code(200);
    echo json_encode(['message' => 'Servidor backend activo']);

} else {
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);
}
?>