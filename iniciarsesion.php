<?php
session_start();

// Variables para mensajes
$mensaje = '';
$tipo_mensaje = '';

// Crear conexión
$conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $correo = $_POST['username'];
    $contrasenia_ingresada = $_POST['password'];

    // Preparar la consulta para verificar el usuario
    $sql = "SELECT id_usuario, nombre_usuario, id_rol, contrasenia FROM usuario WHERE correo = ?";
    
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // El usuario existe, obtener detalles
            $stmt->bind_result($id_usuario, $nombre_usuario, $id_rol, $contrasenia);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($contrasenia_ingresada, $contrasenia)) {
                // Guardar detalles en la sesión
                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['nombre_usuario'] = $nombre_usuario;
                $_SESSION['id_rol'] = $id_rol;

                $base_url = dirname($_SERVER['REQUEST_URI']);

                // Redirigir según el rol
                if ($id_rol == 1) { // Suponiendo que el rol de Administrador tiene id_rol = 1
                    header("Location: " . $base_url . "/proyecto/listado.php");
                } else {
                    header("Location: " . $base_url . "/index.php");
                }
                exit();
            } else {
                $mensaje = "Correo o contraseña incorrectos.";
                $tipo_mensaje = "danger";
            }
        } else {
            $mensaje = "Correo o contraseña incorrectos.";
            $tipo_mensaje = "danger";
        }
        $stmt->close();
    } else {
        $mensaje = "Error al preparar la consulta.";
        $tipo_mensaje = "danger";
    }
}

$conexion->close();
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
    <title>Iniciar sesión</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand py-3" href=""><strong>Vida Azul</strong></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
            </ul>
        </div>
    </div>
</nav> 

    <section style="overflow-x: hidden;">
        <div class="row py-2 justify-content-center align-items-center">
            <div class="col-md-6 p-4">
                <div class="jumbotron-fluid text-center img_inicio" style="background-image: url('https://static.vecteezy.com/system/resources/previews/010/970/477/non_2x/nature-of-green-leaf-environment-ecology-greenery-wallpaper-free-photo.jpg');
                     background-size: cover; color: #02020a;
                     padding: 200px 0;
                     font-weight: bold;">
                    <div class="container">
                        <h1 class="display-4" style="color: #112A26; font-size: 6rem; font-weight: bold;"><strong>Vida
                                Azul</strong></h1>
                        <p class="lead" style="color: #112A26; font-size: 1.5rem; font-weight: bold;"><strong>Conecta,
                                Aprende, Actúa</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row py-2 justify-content-center">
                    <div class="col-md-12 py-4">
                        <?php if ($mensaje): ?>
                            <div class="alert alert-<?= $tipo_mensaje; ?> text-center">
                                <?= $mensaje; ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-header" style="background-color: #32746D; color: white; text-align: center;">
                            <h2>Iniciar Sesión</h2>
                        </div>
                        <div class="card-body" style="padding: 2rem;">
                            <form method="post" action="">
                                <div class="mb-4">
                                    <input type="email" class="form-control form-control-lg" name="username"
                                        placeholder="Correo" required>
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        placeholder="Contraseña" required>
                                </div>

                                <div class="mb-4">
                                    <a class="dropdown-item text-center mb-2" href="registro.php">Regístrate</a>
                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-danger btn-lg" style="background-color: #32746D;
                                        border-color: #32746D; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">Iniciar
                                        Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="p-4"> </div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
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