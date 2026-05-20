<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/../models/user.model.php';

$action = $_GET['action'] ?? '';
$input  = json_decode(file_get_contents("php://input"), true);

switch ($action) {
    case 'registro':
        if (!isset($input['nombre'], $input['email'], $input['password'])) {
            http_response_code(400);
            echo json_encode(["error" => "Datos incompletos"]);
            break;
        }
        echo json_encode(registrarUsuario($input['nombre'], $input['email'], $input['password']));
        break;

    case 'login':
        if (!isset($input['email'], $input['password'])) {
            http_response_code(400);
            echo json_encode(["error" => "Datos incompletos"]);
            break;
        }
        $result = loginUsuario($input['email'], $input['password']);
        if (isset($result['error'])) http_response_code(401);
        echo json_encode($result);
        break;

    case 'listar':
        // SOLO PARA DESARROLLO, eliminar en producción
        global $pdo;
        require_once __DIR__ . '/../database/connection.php';
        $stmt = $pdo->query("SELECT id, nombre, email, created_at FROM usuarios ORDER BY created_at DESC");
        echo json_encode($stmt->fetchAll());
        break;

    default:
        http_response_code(400);
        echo json_encode(["error" => "Acción no válida"]);
}
?>