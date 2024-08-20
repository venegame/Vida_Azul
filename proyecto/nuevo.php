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
            <h3 class="my-3">Nuevo proyecto</h3>

            <!-- Formulario para crear un nuevo proyecto -->
            <form action="" class="row g-3" method="post" autocomplete="off">
                <div class="col-md-4">
                    <label for="id_proyecto" class="form-label">ID Proyecto</label>
                    <input type="text" class="form-control" id="id_proyecto" name="id_proyecto" required autofocus>
                </div>

                <div class="col-md-4">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <?php
                        // Conexión a la base de datos
                        include '../conexion.php';


                        // Obtener los usuarios de la base de datos
                        $result = $conexion->query("SELECT id_usuario, nombre_usuario FROM Usuario");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_usuario']}'>{$row['nombre_usuario']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <select class="form-select" id="id_categoria" name="id_categoria" required>
                        <?php
                        // Obtener las categorías de la base de datos
                        $result = $conexion->query("SELECT id_categoria, nombre_categoria FROM Categoria");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="nombre_proyecto" class="form-label">Nombre Proyecto</label>
                    <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" required>
                </div>

                <div class="col-md-6">
                    <label for="detalle_proyecto" class="form-label">Detalle Proyecto</label>
                    <input type="text" class="form-control" id="detalle_proyecto" name="detalle_proyecto" required>
                </div>

                <div class="col-md-6">
                    <label for="estado_proyecto" class="form-label">Estado Proyecto</label>
                    <input type="text" class="form-control" id="estado_proyecto" name="estado_proyecto" required>
                </div>

                <div class="col-12">
                    <a href="../proyecto/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $id_proyecto = $_POST['id_proyecto'];
                $id_usuario = $_POST['id_usuario'];
                $id_categoria = $_POST['id_categoria'];
                $nombre_proyecto = $_POST['nombre_proyecto'];
                $detalle_proyecto = $_POST['detalle_proyecto'];
                $estado_proyecto = $_POST['estado_proyecto'];

                // Insertar el nuevo proyecto en la base de datos
                $sql = "INSERT INTO Proyecto (id_proyecto, id_usuario, id_categoria, nombre_proyecto, detalle_proyecto, estado_proyecto) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ssssss", $id_proyecto, $id_usuario, $id_categoria, $nombre_proyecto, $detalle_proyecto, $estado_proyecto);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Proyecto guardado exitosamente</div>";
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
