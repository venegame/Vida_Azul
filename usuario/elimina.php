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

    <main class="flex-shrink-0">
        <div class="container">
            <?php
            // Crear conexión
            include '../conexion.php';


            $mensaje = '';
            $tipo_mensaje = '';

            // Verificar si el ID del registro a eliminar se ha pasado por GET
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);

                // Preparar la consulta de eliminación
                $sql = "DELETE FROM usuario WHERE id_usuario = ?";
                if ($stmt = $conexion->prepare($sql)) {
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) {
                        // Mensaje de confirmación
                        $mensaje = "Registro eliminado exitosamente.";
                        $tipo_mensaje = "success";
                    } else {
                        $mensaje = "Error al eliminar el registro: " . $stmt->error;
                        $tipo_mensaje = "danger";
                    }
                    $stmt->close();
                } else {
                    $mensaje = "Error en la preparación de la consulta: " . $conexion->error;
                    $tipo_mensaje = "danger";
                }
            } else {
                $mensaje = "No se ha proporcionado un ID para eliminar.";
                $tipo_mensaje = "warning";
            }

            $conexion->close();
            ?>

            <div class="row">
                <div class="col text-center my-3">
                    <h2><?php echo $mensaje; ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="../usuario/listado.php" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;" class="col text-center text-white mt-auto p-1">
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
