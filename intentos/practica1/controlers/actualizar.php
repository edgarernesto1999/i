<?php
include_once '../clase/conexion.php';
header('Content-Type: application/json');

try{
    $quety =$pdo->query("SELECT * FROM estudiante");
    $estudiantes = $quety->fetchAll(PDO::FETCH_ASSOC);
    foreach ($estudiantes as $estudiante){
        echo '<tr>';
        echo '<td>' .htmlspecialchars( $estudiante['id'] ). '</td>';
        echo '<td>' .htmlspecialchars( $estudiante['cedula'] ). '</td>';
        echo '<td>' .htmlspecialchars( $estudiante['nombre'] ). '</td>';
    }
}catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener los datos: ' . $e->getMessage()]);
}
?>