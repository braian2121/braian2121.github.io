<?php
$conn = new mysqli("localhost", "root", "", "Restaurante");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$personas = $_POST['personas'];

$sql = "UPDATE reservas SET nombre = ?, fecha = ?, hora = ?, telefono = ?, correo = ?, personas = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $nombre, $fecha, $hora, $telefono, $correo, $personas, $id);

if ($stmt->execute()) {
    echo "Reserva actualizada exitosamente. <a href='mostrar.php'>Volver a reservas</a>";
} else {
    echo "Error al actualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
