<?php 
include_once '../clase/conexion.php';
$query = $pdo->query("SELECT * FROM estudiante");
$estudiantes = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../controlers/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Estudiantes</h1>
        <h2>registrar estudiantes</h2>
        <form action="../controlers/guardar.php" method="POST">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
            
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <button type="submit">Guardar</button>
        </form>
        <h2>Buscar Estudiantes</h2>
        <form id="searchForm" action="../controlers/buscar.php" method="GET">
            <input type="text" id="search" name="search" placeholder="Buscar por cédula, nombre o apellido">
            <button type="submit">Buscar</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($estudiante['id']); ?></td>
                        <td><?php echo htmlspecialchars($estudiante['cedula']); ?></td>
                        <td><?php echo htmlspecialchars($estudiante['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($estudiante['apellido']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>    
</html>