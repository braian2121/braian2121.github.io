<?php
$conn = new mysqli("localhost", "root", "", "restaurante");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$personas = $_POST['personas'];

$sql = "INSERT INTO reservas (nombre, fecha, hora, telefono, correo, personas) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nombre, $fecha, $hora, $telefono, $correo, $personas);

if ($stmt->execute()) {
    echo "Reserva guardada exitosamente. <a href='registro.html'>Volver al registro</a>";
} else {
    echo "Error al guardar la reserva: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
