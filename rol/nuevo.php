<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul - Nuevo Rol</title>
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
            <h3 class="my-3">Nuevo Rol</h3>

            <?php
            // Procesar el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Crear conexión
                include '../conexion.php';

                // Obtener datos del formulario
                $id_rol = $_POST['id_rol'];
                $nombre_rol = $_POST['nombre_rol'];

                // Insertar nuevo rol
                $sql = "INSERT INTO rol (id_rol, nombre_rol) VALUES (?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param('is', $id_rol, $nombre_rol);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>Rol creado exitosamente.</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error al crear el rol: " . $conexion->error . "</div>";
                }

                $stmt->close();
                $conexion->close();
            }
            ?>

            <form action="nuevo.php" class="row g-3" method="post" autocomplete="off">
                <div class="col-md-4">
                    <label for="id_rol" class="form-label">ID Rol</label>
                    <input type="text" class="form-control" id="id_rol" name="id_rol" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="nombre_rol" class="form-label">Nombre Rol</label>
                    <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" required>
                </div>

                <div class="col-12">
                    <a href="listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container">
            <div class="col">
                <p style="color: white;">&COPY; Vida Azul Derechos Reservados 2024</p>
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
