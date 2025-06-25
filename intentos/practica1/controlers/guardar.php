<?php

include_once '../clase/conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Validar que los campos no estén vacíos
    if (empty($cedula) || empty($nombre) || empty($apellido)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO estudiante (cedula, nombre, apellido) VALUES (:cedula, :nombre, :apellido)";
    
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        
        // Ejecutar la consulta
        if ($stmt->execute()) { 
            $response['success'] = true;
            $response['message'] = "Datos guardados correctamente.";
            $response['last_id'] = $pdo->lastInsertId();

            echo json_encode($response);
            header('Location: ../vistas/lista.php');
            
        } else {
            echo "Error al guardar los datos.";
        }
    
}
?>