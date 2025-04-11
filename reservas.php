<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservaciones - El Rincón del Sabor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h1 class="mb-4">Listado de Reservaciones</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $archivo = "reservaciones.txt";
            if (file_exists($archivo)) {
                $lineas = file($archivo);
                foreach ($lineas as $linea) {
                    $datos = explode("|", trim($linea));
                    echo "<tr>";
                    foreach ($datos as $dato) {
                        echo "<td>" . htmlspecialchars($dato) . "</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay reservaciones registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
</body>
</html>