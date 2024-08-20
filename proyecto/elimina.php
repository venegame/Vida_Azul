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

    <?php
    // Manejo de la solicitud de eliminación
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_proyecto'])) {
        $id_proyecto = $_POST['id_proyecto'];
        include '../conexion.php';


        $sql = "DELETE FROM proyecto WHERE id_proyecto = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_proyecto);

        if ($stmt->execute()) {
            $mensaje = "Registro eliminado exitosamente.";
        } else {
            $mensaje = "Error al eliminar el registro: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    } elseif (isset($_GET['id'])) {
        // Mostrar confirmación si se pasa un ID por GET
        $mensaje = "¿Estás seguro de que deseas eliminar este registro?";
        $id_proyecto = $_GET['id'];
    } else {
        $mensaje = "ID del proyecto no especificado.";
        $id_proyecto = null;
    }
    ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col text-center my-3">
                    <h2><?php echo $mensaje; ?></h2>
                </div>
            </div>

            <?php if ($id_proyecto): ?>
                <form method="POST" action="">
                    <input type="hidden" name="id_proyecto" value="<?php echo htmlspecialchars($id_proyecto); ?>">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a href="../proyecto/listado.php" class="btn btn-secondary">Regresar</a>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="row">
                    <div class="col text-center">
                        <a href="../proyecto/listado.php" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;" class="col text-center text-white mt-auto p-1">
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
