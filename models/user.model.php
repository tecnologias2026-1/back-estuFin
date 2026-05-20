<?php
require_once __DIR__ . '/../database/connection.php';

function registrarUsuario($nombre, $email, $password) {
    global $pdo;

    // Verificar si ya existe
    $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $check->execute([':email' => $email]);
    if ($check->fetch()) {
        return ["error" => "El correo ya está registrado"];
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare(
        "INSERT INTO usuarios (nombre, email, password_hash) 
         VALUES (:nombre, :email, :hash)"
    );
    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email,
        ':hash'   => $hash
    ]);

    return ["mensaje" => "Usuario registrado exitosamente"];
}

function loginUsuario($email, $password) {
    global $pdo;

    $stmt = $pdo->prepare(
        "SELECT id, nombre, email, password_hash 
         FROM usuarios WHERE email = :email"
    );
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();

    if (!$usuario || !password_verify($password, $usuario['password_hash'])) {
        return ["error" => "Correo o contraseña incorrectos"];
    }

    return [
        "mensaje" => "Login exitoso",
        "usuario" => [
            "id"     => $usuario['id'],
            "nombre" => $usuario['nombre'],
            "email"  => $usuario['email']
        ]
    ];
}