<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root"; // Cambiar si es necesario
$password = ""; // Cambiar si es necesario
$database = "vida_azul";

// Crear conexión
$conn = new mysqli("localhost", "root", "", "vida_azul");

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener el ID del proyecto desde la URL
$id_proyecto = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Obtener los detalles del proyecto
$stmt = $conn->prepare("SELECT p.*, u.nombre_usuario, u.apellido_usuario, c.nombre_categoria 
                        FROM proyecto p
                        LEFT JOIN usuario u ON p.id_usuario = u.id_usuario
                        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
                        WHERE p.id_proyecto = ?");
$stmt->bind_param("i", $id_proyecto);
$stmt->execute();
$result = $stmt->get_result();
$proyecto = $result->fetch_assoc();

if (!$proyecto) {
    die("Proyecto no encontrado.");
}

$stmt->close();

// Obtener las imágenes del proyecto
$stmt = $conn->prepare("SELECT ruta_imagen FROM proyecto_imagenes WHERE id_proyecto = ?");
$stmt->bind_param("i", $id_proyecto);
$stmt->execute();
$imagenes_result = $stmt->get_result();
$imagenes = [];
while ($row = $imagenes_result->fetch_assoc()) {
    $imagenes[] = $row['ruta_imagen'];
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?> - Detalle del Proyecto</title>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <div class="project-header">
        <img src="https://www.ultraimagehub.com/wallpapers/tr:flp-false,gx-0.7,gy-0.5,q-75,rh-3264,rw-5824,th-768,tw-1366/1242066965409824808.jpeg" alt="<?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?>" class="project-image">
        <h2 class="centered"><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></h2>
    </div>

    <div class="container my-4">
        <div class="project-detail content">
            <p><strong>Descripción del Proyecto:</strong> <?php echo htmlspecialchars($proyecto['detalle_proyecto']); ?></p>
            <p><strong>Responsable:</strong> <?php echo htmlspecialchars($proyecto['nombre_usuario'] . ' ' . $proyecto['apellido_usuario']); ?></p>
            <p><strong>Categoría:</strong> <?php echo htmlspecialchars($proyecto['nombre_categoria']); ?></p>
            <p><strong>Estado:</strong> <?php echo htmlspecialchars($proyecto['estado_proyecto']); ?></p>

            <h3 class="centered">Imágenes</h3>
            <div class="image-gallery">
                <?php foreach ($imagenes as $imagen): ?>
                    <div class="gallery-item"><img src="<?php echo htmlspecialchars($imagen); ?>" alt="Imagen del proyecto"></div>
                <?php endforeach; ?>
            </div>
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
        // Selecciona todas las imágenes dentro de los elementos con la clase 'gallery-item'
        document.querySelectorAll('.gallery-item img').forEach(img => {
            // Añade un evento de clic a cada imagen
            img.addEventListener('click', () => {
                // Abre la imagen en una nueva ventana o pestaña cuando se hace clic
                window.open(img.src, '_blank');
            });
        });
    </script>

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