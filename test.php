<?php
// test.php
require_once 'connection.php';

// $pdo ya está disponible desde connection.php
if ($pdo) {
    echo "<h1>¡Conexión exitosa a EstuFin! 🎉</h1>";
    echo "<p>PHP ya se comunica correctamente con tu base de datos en Supabase.</p>";

    // Prueba extra: listar las tablas
    $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $tablas = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "<strong>Tablas detectadas en tu base de datos:</strong><br>";
    foreach ($tablas as $tabla) {
        echo "- " . $tabla . "<br>";
    }
} else {
    echo "<h1>Error: La conexión devolvió un valor nulo. ❌</h1>";
}
?>