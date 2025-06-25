<?php
include_once '../clase/conexion.php';

header('Content-Type: text/html; charset=UTF-8');

try {
    $searchTerm = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';
    $sql = "SELECT * FROM estudiante";
    $params = [];

    if (!empty($searchTerm)) {
       
        $sql .= " WHERE cedula LIKE :searchTerm OR nombre LIKE :searchTerm OR apellido LIKE :searchTerm";
        $params[':searchTerm'] = '%' . $searchTerm . '%';
    }


    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($estudiantes) {
        foreach ($estudiantes as $estudiante) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($estudiante['id']) . '</td>';
            echo '<td>' . htmlspecialchars($estudiante['cedula']) . '</td>';
            echo '<td>' . htmlspecialchars($estudiante['nombre']) . '</td>';
            echo '<td>' . htmlspecialchars($estudiante['apellido']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4" class="no-data">No se encontraron estudiantes.</td></tr>';
    }

} catch (PDOException $e) {
    error_log("Error al buscar estudiantes: " . $e->getMessage()); 
    echo '<tr><td colspan="4">Error al buscar datos: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
}
exit; 
?>