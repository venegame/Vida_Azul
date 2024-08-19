<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <div id="navbar-placeholder"></div>

    <?php
    // Crear conexión
    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul","3307");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $mensaje = '';
    $tipo_mensaje = '';

    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        // Encriptar la contraseña
        $contrasenia_hash = password_hash($contrasenia, PASSWORD_BCRYPT);

        // ID del rol de Usuario (asumimos que es 2, ajusta según tu base de datos)
        $id_rol_usuario = 2;

        // Verificar si el correo ya está registrado
        $sql_check = "SELECT * FROM usuario WHERE correo = ?";
        if ($stmt_check = $conexion->prepare($sql_check)) {
            $stmt_check->bind_param("s", $correo);
            $stmt_check->execute();
            $result = $stmt_check->get_result();
            
            if ($result->num_rows > 0) {
                // Si ya existe el correo
                $mensaje = "El correo electrónico ya está registrado.";
                $tipo_mensaje = "warning";
            } else {
                // Insertar el usuario en la base de datos
                $sql = "INSERT INTO usuario (nombre_usuario, apellido_usuario, correo, contrasenia, id_rol) 
                        VALUES (?, ?, ?, ?, ?)";

                if ($stmt = $conexion->prepare($sql)) {
                    $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $contrasenia_hash, $id_rol_usuario);
                    if ($stmt->execute()) {
                        $mensaje = "Registro exitoso. Puedes iniciar sesión ahora.";
                        $tipo_mensaje = "success";
                    } else {
                        $mensaje = "Error al registrar el usuario: " . $stmt->error;
                        $tipo_mensaje = "danger";
                    }
                    $stmt->close();
                } else {
                    $mensaje = "Error en la preparación de la consulta: " . $conexion->error;
                    $tipo_mensaje = "danger";
                }
            }
            $stmt_check->close();
        }
    }

    $conexion->close();
    ?>

    <section style="overflow-x: hidden;">
        <div class="row py-2 justify-content-center">
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
                    <div class="col-md-12 py-3">
                        <a href="/index.php" class="btn btn-primary" style="background-color: #32746D; border: none">
                            <i class="fas fa-arrow-left" style="background-color: #32746D"></i> Regresar
                        </a>
                    </div>
                </div>
                <div class="row py-2 justify-content-center">
                    <?php if ($mensaje): ?>
                        <div class="alert alert-<?php echo $tipo_mensaje; ?> text-center" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" class="was-validated">
                        <div class="card-header" style="background-color: #32746D; color: white; text-align: center;">
                            <h4>Agregar Usuario</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" name="nombre" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido de usuario</label>
                                <input type="text" class="form-control" name="apellido" required />
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo" required />
                            </div>
                            <div class="mb-3">
                                <label for="contrasenia" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenia" required />
                            </div>

                            <a class="dropdown-item col text-center p-2" href="iniciarsesion.php">Inicia Sesión</a>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success" id="submitBtn"
                                style="background-color: #32746D; border-color: #32746D; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
                                <i class="fas fa-envelope"></i> Registrar usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY; Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
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

        document.getElementById("submitBtn").addEventListener("click", function() {
            this.disabled = true;
            this.form.submit();
        });
    </script>
</body>

</html>
