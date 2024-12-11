<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Reservas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 0; }
        h1 { text-align: center; color: #444; margin-top: 20px; }
        ul { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); list-style: none; }
        ul li { padding: 10px 0; border-bottom: 1px solid #ddd; }
        ul li:last-child { border-bottom: none; }
        a { text-decoration: none; color: #007BFF; }
        a:hover { text-decoration: underline; }
        p { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Informe de Reservas Registradas</h1>
    <ul>
        <?php
        $conn = new mysqli("localhost", "root", "", "Restaurante");
        if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);
        
        $sql = "SELECT fecha, COUNT(*) as total FROM reservas GROUP BY fecha";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>Fecha: {$row['fecha']} - Total de Reservas: {$row['total']}</li>";
            }
        } else {
            echo "<p>No hay reservas disponibles.</p>";
        }

        $conn->close();
        ?>
    </ul>
    <p>
        <a href="registro.html">Registrar Reserva</a> | <a href="mostrar.php">Ver Reservas</a>
    </p>
</body>
</html>
