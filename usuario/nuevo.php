<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul - Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <div id="navbar-placeholder"></div>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Nuevo Usuario</h3>

            <!-- Formulario para crear un nuevo usuario -->
            <form action="" class="row g-3" method="post" autocomplete="off">
                <div class="col-md-4">
                    <label for="id_usuario" class="form-label">ID Usuario</label>
                    <input type="text" class="form-control" id="id_usuario" name="id_usuario" required autofocus>
                </div>

                <div class="col-md-4">
                    <label for="nombre_usuario" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                </div>

                <div class="col-md-4">
                    <label for="apellido_usuario" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" required>
                </div>

                <div class="col-md-6">
                    <label for="correo_usuario" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" required>
                </div>

                <div class="col-md-6">
                    <label for="contraseña_usuario" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña_usuario" name="contraseña_usuario" required>
                </div>

                <div class="col-md-6">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" id="id_rol" name="id_rol" required>
                        <?php
                        // Conexión a la base de datos
                        $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        // Obtener los roles de la base de datos
                        $result = $conexion->query("SELECT id_rol, nombre_rol FROM rol");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_rol']}'>{$row['nombre_rol']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-12">
                    <a href="../usuario/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $id_usuario = $_POST['id_usuario'];
                $nombre_usuario = $_POST['nombre_usuario'];
                $apellido_usuario = $_POST['apellido_usuario'];
                $correo_usuario = $_POST['correo_usuario'];
                $contraseña_usuario = $_POST['contraseña_usuario'];
                $id_rol = $_POST['id_rol'];

                // Encriptar la contraseña
                    $contraseña_encriptada = password_hash($contraseña_usuario, PASSWORD_BCRYPT);

                // Insertar el nuevo usuario en la base de datos
                $sql = "INSERT INTO usuario (id_usuario, nombre_usuario, apellido_usuario, correo, contrasenia, id_rol) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("sssssi", $id_usuario, $nombre_usuario, $apellido_usuario, $correo_usuario, $contraseña_encriptada, $id_rol);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Usuario guardado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error ingresando registro: " . $stmt->error . "</div>";
                }
                $stmt->close();
                $conexion->close();
            }
            ?>
        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('../navbar_cruds.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>
</body>

</html>
