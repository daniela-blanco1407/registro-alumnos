<?php
$serverName = "tcp:serverdani.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "ProyectoDB",
    "Uid" => "daniuser",
    "PWD" => "Hope2tim2*3",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0,
    "LoginTimeout" => 30
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$nombre = $_GET['nombre'];

$sql = "SELECT numero_control, carrera FROM alumnos WHERE nombre LIKE ?";
$params = array("%$nombre%");

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error en la consulta.";
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($stmt)) {
    echo "<h2>Resultados:</h2><ul>";
    while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<li>Número de control: {$fila['numero_control']} | Carrera: {$fila['carrera']}</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron resultados.";
}

sqlsrv_close($conn);
?>
