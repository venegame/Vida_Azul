<?php
session_start(); // Inicia la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si el usuario no está autenticado
    exit();
}

// Crear conexión
$conn = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Inicializar variables para evitar errores de "undefined array key"
$nombre = $_SESSION['nombre_usuario'];
$comentario = '';

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comentario'])) {
    $comentario = trim($_POST['comentario']);

    if ($comentario !== '') {
        $fechaComentario = date('Y-m-d H:i:s');

        // Obtener el id_usuario basado en el nombre
        $stmt = $conn->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_usuario = $row['id_usuario'];
        } else {
            $id_usuario = NULL;
        }

        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO comentario (id_usuario, fecha_comentario, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id_usuario, $fechaComentario, $comentario);

        if ($stmt->execute()) {
            header("Location: opiniones.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "El comentario no puede estar vacío.";
    }
}

// Obtener todos los comentarios para mostrar
$comentarios = $conn->query("SELECT comentario.id_comentario, usuario.nombre_usuario, comentario.fecha_comentario, comentario.comentario FROM comentario LEFT JOIN usuario ON comentario.id_usuario = usuario.id_usuario ORDER BY comentario.fecha_comentario DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Opiniones - Vida Azul</title>
    <style>
        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .comment-actions {
            display: flex;
            gap: 10px;
        }
        .comment-header span {
            margin-right: auto;
            margin-left: 10px;
            color: #6c757d;
            font-size: 0.875rem;
        }
        .btn-sm {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
        }
        .btn-sm i {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div id="navbar-placeholder"></div>

    <!-- Encabezado de la página -->
    <div class="project-header">
        <img src="https://images.pexels.com/photos/3264779/pexels-photo-3264779.jpeg" alt="Vida Azul"
            class="project-image">
        <h2 class="centered">Opiniones</h2>
    </div>

    <div class="container my-4">
        <h2 class="text-center">Ayúdanos a crecer, bríndanos tu opinión</h2>

        <!-- Formulario de comentarios -->
        <form id="commentForm" method="POST" class="my-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Escribe tu comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>

        <!-- Sección de comentarios -->
        <div id="commentsSection">
            <?php while($row = $comentarios->fetch_assoc()): ?>
                <div class="comment-card">
                    <div class="comment-header">
                        <strong><?php echo htmlspecialchars($row['nombre_usuario'] ?? 'Anónimo'); ?></strong>
                        <span><?php echo $row['fecha_comentario']; ?></span>
                        <div class="comment-actions">
                            <!-- Botón para eliminar comentario -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id_comentario" value="<?php echo $row['id_comentario']; ?>">
                            </form>
                        </div>
                    </div>
                    <p class="comment-text"><?php echo htmlspecialchars($row['comentario']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&COPY;Vida Azul Derechos Reservados 2024</p>
        </div>
    </footer>

    <!-- Scripts -->
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNpD3rrqJpoMxO2kWklO5LKo4KNAXzJ6pEI3UU6p7UANFUbe1ybFf5OOGecfKq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGfriJr4j3LaFf8iSO6F38VRz8CU5u0pYZ7r7t2C0BIpFz8GA7rXGf3z7Lx" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
