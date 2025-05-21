<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_GET['nombre'];

$sql = "SELECT numero_control, carrera FROM alumnos WHERE nombre LIKE '%$nombre%'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Resultados:</h2><ul>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<li>Número de control: {$fila['numero_control']} | Carrera: {$fila['carrera']}</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>
