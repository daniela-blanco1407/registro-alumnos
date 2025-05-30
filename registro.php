<?php
try {
    $conn = new PDO(
        "sqlsrv:server = tcp:serverdani.database.windows.net,1433; Database = ProyectoDB",
        "daniuser",
        "Hope2tim2*3"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = $_POST['nombre'];
    $numero_control = $_POST['numero_control'];
    $carrera = $_POST['carrera'];

    $sql = "INSERT INTO alumnos (nombre, numero_control, carrera) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $numero_control, $carrera]);

    echo "Alumno registrado con éxito. <a href='index.html'>Volver</a>";
} catch (PDOException $e) {
    echo "Error al registrar: " . $e->getMessage();
}
?>

