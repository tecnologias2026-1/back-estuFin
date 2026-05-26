<?php
require_once __DIR__ . '/../models/user.model.php';

function handleAuthRoutes($method, $path) {  // ← solo cambia este nombre
    if ($path === '/usuarios/registro' && $method === 'POST') {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!isset($input['nombre'], $input['email'], $input['password'])) {
            http_response_code(400);
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }
        echo json_encode(registrarUsuario($input['nombre'], $input['email'], $input['password']));

    } elseif ($path === '/usuarios/login' && $method === 'POST') {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!isset($input['email'], $input['password'])) {
            http_response_code(400);
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }
        $result = loginUsuario($input['email'], $input['password']);
        if (isset($result['error'])) http_response_code(401);
        echo json_encode($result);

    } else {
        http_response_code(404);
        echo json_encode(["error" => "Ruta no encontrada"]);
    }
}
?>