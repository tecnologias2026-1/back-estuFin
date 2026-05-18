<?php
$host = "aws-1-us-west-2.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";
$user = "postgres.gacwwqkjldwcfdpnzyal";
$password = "EstuFinBasedeDatos";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die(json_encode(["error" => $e->getMessage()]));
}
?>