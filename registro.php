<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$numero_control = $_POST['numero_control'];
$carrera = $_POST['carrera'];

$sql = "INSERT INTO alumnos (nombre, numero_control, carrera) VALUES ('$nombre', '$numero_control', '$carrera')";

if ($conexion->query($sql) === TRUE) {
    echo "Alumno registrado con éxito. <a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
