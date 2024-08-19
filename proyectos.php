<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root"; // Cambiar si es necesario
$password = ""; // Cambiar si es necesario
$database = "vida_azul";

// Crear conexión
$conn = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul"
);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener proyectos en ejecución
$proyectosEnEjecucion = $conn->query("SELECT * FROM proyecto WHERE estado_proyecto = 'En Progreso'");

// Obtener proyectos concluidos
$proyectosConcluidos = $conn->query("SELECT * FROM proyecto WHERE estado_proyecto = 'Completado'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Proyectos - Vida Azul</title>
</head>
<body>
    <div id="navbar-placeholder"></div>

    <div class="content">
        <h2>Proyectos en Ejecución</h2>
        <div class="projects-grid">
            <?php while($proyecto = $proyectosEnEjecucion->fetch_assoc()): ?>
                <div class="project-card">
                    <img src="https://img.freepik.com/foto-gratis/papeles-comerciales-naturaleza-muerta-varias-piezas-mecanismo_23-2149352652.jpg" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>">
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h3>
                        <a href="proyectosDetalle.php?id=<?php echo $proyecto['id_proyecto']; ?>" class="btn"><i class="bi bi-bookmark-plus"></i> Leer más</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <h2>Proyectos Concluidos</h2>
        <div class="projects-grid">
            <?php while($proyecto = $proyectosConcluidos->fetch_assoc()): ?>
                <div class="project-card">
                    <img src="https://blog.infoempleo.com/media/2021/12/TuEmpleo_Voluntariado-ONU-1-881x399.jpg" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>">
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h3>
                        <a href="proyectosDetalle.php?id=<?php echo $proyecto['id_proyecto']; ?>" class="btn"><i class="bi bi-bookmark-plus"></i> Leer más</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="footer mt-auto text-center">
        <div class="container">
            <div class="col">
                <p>&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
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
$conn->close();
?>
