<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul - Eliminar Rol</title>
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
            <?php
            // Verificar si se ha enviado el ID del rol
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                echo "<div class='alert alert-danger' role='alert'>ID de rol no especificado.</div>";
                exit;
            }

            include '../conexion.php';


            $id_rol = $_GET['id'];

            // Eliminar rol
            $sql = "DELETE FROM categoria WHERE id_categoria = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('i', $id_rol);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>Categoria eliminada exitosamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al eliminar la categoria: " . $conexion->error . "</div>";
            }

            $stmt->close();
            $conexion->close();
            ?>

            <div class="row">
                <div class="col text-center my-3">
                    <h2>Registro eliminado</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="../categoria/listado.php" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </main>

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
