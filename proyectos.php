<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener proyectos en ejecución con imágenes
$queryEjecucion = "
    SELECT p.id_proyecto, p.nombre_proyecto, pi.ruta_imagen
    FROM proyecto p
    LEFT JOIN proyecto_imagenes pi ON p.id_proyecto = pi.id_proyecto
    WHERE p.estado_proyecto = 'En Progreso'
";
$proyectosEnEjecucion = $conexion->query($queryEjecucion);

// Obtener proyectos concluidos con imágenes
$queryConcluidos = "
    SELECT p.id_proyecto, p.nombre_proyecto, pi.ruta_imagen
    FROM proyecto p
    LEFT JOIN proyecto_imagenes pi ON p.id_proyecto = pi.id_proyecto
    WHERE p.estado_proyecto = 'Completado'
";
$proyectosConcluidos = $conexion->query($queryConcluidos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Proyectos - Vida Azul</title>
    <style>
        .project-card {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1rem;
            text-align: center;
        }
        .project-card img {
            width: 100%;
            height: auto;
        }
        .card-content {
            padding: 1rem;
        }
        .btn {
            background-color: #32746D;
            border: none;
            color: white;
        }
        .btn:hover {
            background-color: #275a50;
        }
    </style>
</head>
<body>
    <div id="navbar-placeholder"></div>

    <div class="container mt-4">
        <h2>Proyectos en Ejecución</h2>
        <div class="row">
            <?php while($proyecto = $proyectosEnEjecucion->fetch_assoc()): ?>
                <div class="col-md-4 mb-3">
                    <div class="project-card">
                        <?php if (!empty($proyecto['ruta_imagen'])): ?>
                            <img src="<?php echo htmlspecialchars($proyecto['ruta_imagen']); ?>" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>">
                        <?php else: ?>
                            <img src="default-image.jpg" alt="Imagen no disponible">
                        <?php endif; ?>
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h3>
                            <a href="proyectosDetalle.php?id=<?php echo $proyecto['id_proyecto']; ?>" class="btn"><i class="bi bi-bookmark-plus"></i> Leer más</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <h2>Proyectos Concluidos</h2>
        <div class="row">
            <?php while($proyecto = $proyectosConcluidos->fetch_assoc()): ?>
                <div class="col-md-4 mb-3">
                    <div class="project-card">
                        <?php if (!empty($proyecto['ruta_imagen'])): ?>
                            <img src="<?php echo htmlspecialchars($proyecto['ruta_imagen']); ?>" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>">
                        <?php else: ?>
                            <img src="default-image.jpg" alt="Imagen no disponible">
                        <?php endif; ?>
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h3>
                            <a href="proyectosDetalle.php?id=<?php echo $proyecto['id_proyecto']; ?>" class="btn"><i class="bi bi-bookmark-plus"></i> Leer más</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="footer mt-auto text-center py-3">
        <div class="container">
            <p>&COPY; Vida Azul Derechos Reservados 2024</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('navbar.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
