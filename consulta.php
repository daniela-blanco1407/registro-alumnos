<?php
try {
    $conn = new PDO(
        "sqlsrv:server = tcp:serverdani.database.windows.net,1433; Database = ProyectoDB",
        "daniuser",
        "Hope2tim2*3"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = $_GET['nombre'];

    $sql = "SELECT numero_control, carrera FROM alumnos WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$nombre%"]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "<h2>Resultados:</h2><ul>";
        foreach ($resultados as $fila) {
            echo "<li>Número de control: {$fila['numero_control']} | Carrera: {$fila['carrera']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron resultados.";
    }
} catch (PDOException $e) {
    echo "Error al consultar: " . $e->getMessage();
}
?>
