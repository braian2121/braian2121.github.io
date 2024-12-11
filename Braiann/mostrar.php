<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas Guardadas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 0; }
        h1 { text-align: center; color: #444; margin-top: 20px; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: center; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        a { text-decoration: none; color: #007BFF; }
        a:hover { text-decoration: underline; }
        p { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Reservas Registradas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Número de Personas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servidor = "localhost";
            $usuario = "root";
            $contrasena = "";
            $base_datos = "Restaurante";

            $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            $consulta = "SELECT * FROM reservas";
            $resultado = $conexion->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['fecha'] . "</td>";
                    echo "<td>" . $fila['hora'] . "</td>";
                    echo "<td>" . $fila['telefono'] . "</td>";
                    echo "<td>" . $fila['correo'] . "</td>";
                    echo "<td>" . $fila['personas'] . "</td>";
                    echo "<td>
                            <a href='actualizar.php?id=" . $fila['id'] . "'>Editar</a> |
                            <a href='eliminar.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar esta reserva?')\">Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay reservas disponibles</td></tr>";
            }

            $conexion->close();
            ?>
        </tbody>
    </table>
    <p>
        <a href="registro.html">Registrar Reserva</a> | <a href="informe.php">Generar Informe</a>
    </p>
</body>
</html>
