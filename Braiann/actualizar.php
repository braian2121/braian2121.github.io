<?php
$conn = new mysqli("localhost", "root", "", "Restaurante");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM reservas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$registro = $result->fetch_assoc();

if (!$registro) {
    die("Reserva no encontrada.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reserva</title>
</head>
<body>
    <h1>Actualizar Reserva</h1>
    <form action="actualizar_procesar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
        <label for="nombre">Nombre del Cliente:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $registro['nombre']; ?>" required>

        <label for="fecha">Fecha de Reserva:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $registro['fecha']; ?>" required>

        <label for="hora">Hora de Reserva:</label>
        <input type="time" id="hora" name="hora" value="<?php echo $registro['hora']; ?>" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $registro['telefono']; ?>" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $registro['correo']; ?>" required>

        <label for="personas">Número de Personas:</label>
        <input type="number" id="personas" name="personas" value="<?php echo $registro['personas']; ?>" required min="1">

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
