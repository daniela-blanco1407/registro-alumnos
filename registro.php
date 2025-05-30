<?php
$serverName = "tcp:serverdani.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "ProyectoDB",
    "Uid" => "daniuser",
    "PWD" => "Hope2tim2*3.",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0,
    "LoginTimeout" => 30
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$nombre = $_POST['nombre'];
$numero_control = $_POST['numero_control'];
$carrera = $_POST['carrera'];

$sql = "INSERT INTO alumnos (nombre, numero_control, carrera) VALUES (?, ?, ?)";
$params = array($nombre, $numero_control, $carrera);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error al registrar: ";
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Alumno registrado con éxito. <a href='index.html'>Volver</a>";
}

sqlsrv_close($conn);
?>

