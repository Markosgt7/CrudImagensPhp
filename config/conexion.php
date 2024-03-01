<?php
$dbHost = 'localhost';
$dbName = 'carga_archivos';
$dbUser = 'root';
$dbPassword = '';
$uploadDir = $path . $filename;
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO imagenes (ruta) VALUES (:ruta)");
    $stmt->bindParam(':ruta', $uploadDir);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>