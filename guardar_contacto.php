<?php
include 'db/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nombre'], $_POST['correo'], $_POST['asunto'], $_POST['comentario']]);
    header("Location: pages/contacto.php?status=success");
}
?>
