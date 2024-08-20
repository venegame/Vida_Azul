<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul</title>
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
            <h3 class="my-3">Editar Categoría</h3>

            <?php
            //Conexión a la base de datos
            include '../conexion.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $id_categoria = $_POST['id_categoria'];
                $nombre_categoria = $_POST['nombre_categoria'];

                // Validar datos
                if (empty($id_categoria) || empty($nombre_categoria)) {
                    echo '<div class="alert alert-warning" role="alert">Por favor, complete todos los campos.</div>';
                } else {
                    // Escapar los datos para evitar SQL Injection
                    $id_categoria = $conexion->real_escape_string($id_categoria);
                    $nombre_categoria = $conexion->real_escape_string($nombre_categoria);

                    // Actualizar los datos en la base de datos
                    $sql = "UPDATE categoria SET nombre_categoria = '$nombre_categoria' WHERE id_categoria = '$id_categoria'";

                    if ($conexion->query($sql) === TRUE) {
                        echo '<div class="alert alert-success" role="alert">Categoría actualizada con éxito.</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error: ' . $conexion->error . '</div>';
                    }
                }
            } else if (isset($_GET['id'])) {
                // Obtener el ID de la categoría desde la URL
                $id_categoria = $_GET['id'];

                // Validar el ID
                if (empty($id_categoria)) {
                    echo '<div class="alert alert-warning" role="alert">ID de categoría no proporcionado.</div>';
                } else {
                    // Escapar el ID para evitar SQL Injection
                    $id_categoria = $conexion->real_escape_string($id_categoria);

                    // Obtener los datos actuales de la categoría
                    $sql = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nombre_categoria = $row['nombre_categoria'];
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Categoría no encontrada.</div>';
                    }
                }
            }

            $conexion->close();
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3" method="post" autocomplete="off">
                <div class="col-md-4">
                    <label for="id_categoria" class="form-label">ID Categoría</label>
                    <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="<?php echo htmlspecialchars($id_categoria ?? ''); ?>" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="nombre_categoria" class="form-label">Nombre Categoría</label>
                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?php echo htmlspecialchars($nombre_categoria ?? ''); ?>" required>
                </div>

                <div class="col-12">
                    <a href="../categoria/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
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
