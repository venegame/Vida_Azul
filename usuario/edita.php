<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul - Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <div id="navbar-placeholder"></div>

    <?php
    // Conexión a la base de datos
    include '../conexion.php';


    // Si se envía el formulario, procesar los datos
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_usuario = $_POST['id_usuario'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $apellido_usuario = $_POST['apellido_usuario'];
        $correo_usuario = $_POST['correo_usuario'];
        $id_rol = $_POST['id_rol'];
        $nueva_contrasenia = $_POST['contrasenia_usuario'];

        // Obtener la contraseña actual
        $stmt = $conexion->prepare("SELECT contrasenia FROM Usuario WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario_actual = $result->fetch_assoc();
        $contrasenia_actual = $usuario_actual['contrasenia'];
        $stmt->close();

        // Si se envía una nueva contraseña, encriptarla
        if (!empty($nueva_contrasenia)) {
            $contrasenia_cifrada = password_hash($nueva_contrasenia, PASSWORD_BCRYPT);
        } else {
            // Mantener la contraseña actual si no se ha enviado una nueva
            $contrasenia_cifrada = $contrasenia_actual;
        }

        // Actualizar el usuario en la base de datos
        $sql = "UPDATE Usuario SET nombre_usuario = ?, apellido_usuario = ?, correo = ?, id_rol = ?, contrasenia = ? WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi", $nombre_usuario, $apellido_usuario, $correo_usuario, $id_rol, $contrasenia_cifrada, $id_usuario);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success' role='alert'>Usuario actualizado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al actualizar el usuario: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    // Obtener los datos del usuario si se recibe un id de usuario por GET
    if (isset($_GET['id'])) {
        $id_usuario = $_GET['id'];

        // Obtener los datos del usuario
        $sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, correo, id_rol, contrasenia FROM Usuario WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        $stmt->close();
    }

    // Obtener los roles
    $sql = "SELECT id_rol, nombre_rol FROM rol";
    $roles = $conexion->query($sql);

    $conexion->close();
    ?>

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Editar Usuario</h3>

            <form method="POST" action="" class="row g-3">
                <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?? ''; ?>">

                <div class="col-md-6">
                    <label for="nombre_usuario" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                           value="<?php echo $usuario['nombre_usuario'] ?? ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="apellido_usuario" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario"
                           value="<?php echo $usuario['apellido_usuario'] ?? ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="correo_usuario" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" id="correo_usuario" name="correo_usuario"
                           value="<?php echo $usuario['correo'] ?? ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="contrasenia_usuario" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasenia_usuario" name="contrasenia_usuario" 
                           value="" placeholder="***" readonly>
                </div>

                <div class="col-md-6">
                    <label for="id_rol" class="form-label">Rol:</label>
                    <select class="form-control" id="id_rol" name="id_rol" required>
                        <?php while ($rol = $roles->fetch_assoc()): ?>
                            <option value="<?php echo $rol['id_rol']; ?>" <?php if ($rol['id_rol'] == ($usuario['id_rol'] ?? '')) echo 'selected'; ?>>
                                <?php echo $rol['nombre_rol']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="col-12">
                    <a href="../usuario/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

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
