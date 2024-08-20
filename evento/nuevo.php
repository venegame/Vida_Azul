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
            <h3 class="my-3">Nuevo evento</h3>

            <form action="#" class="row g-3" method="post" autocomplete="off">

               
                <div class="col-md-4">
                    <label for="id_evento" class="form-label">ID Evento</label>
                    <input type="text" class="form-control" id="id_evento" name="id_evento" required autofocus>
                </div>

                <div class="col-md-4">
                    <label for="nombre_evento" class="form-label">Nombre Evento</label>
                    <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required>
                </div>

                <div class="col-md-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>

                <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen URL</label>
                    <input type="text" class="form-control" id="imagen" name="imagen">
                </div>

                <div class="col-md-6">
                    <label for="fecha_evento" class="form-label">Fecha Evento</label>
                    <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
                </div>

                <div class="col-md-4">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <select class="form-select" id="id_categoria" name="id_categoria" required>
                        <?php
            include '../conexion.php';

                        // Obtener las categorías de la base de datos
                        $result = $conexion->query("SELECT id_categoria, nombre_categoria FROM Categoria");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-12">
                    <a href="../evento/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_evento = $_POST['id_evento'];
                $nombre_evento = $_POST['nombre_evento'];
                $descripcion = $_POST['descripcion'];
                $imagen = $_POST['imagen'];
                $fecha_evento = $_POST['fecha_evento'];
                $id_categoria = $_POST['id_categoria'];
                include '../conexion.php';

                $sql = "INSERT INTO eventos (id_evento, nombre_evento, descripcion, imagen, fecha_evento, id_categoria) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ssssss", $id_evento, $nombre_evento, $descripcion, $imagen, $fecha_evento, $id_categoria);
                if ($stmt->execute()) {
                    echo "<script>
                            window.addEventListener('load', function() {
                                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                                myModal.show();
                            });
                          </script>";
                } else {
                    echo "Error ingresando registro: " . $stmt->error;
                }
                $stmt->close();
                $conexion->close();
            }
        ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Operacion exitosa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        El registro fue agregado con éxito.
                    </div>
                    <div class="modal-footer">
                        <a href="listado.php" class="btn btn-primary">Regresar</a>
                    </div>
                </div>
            </div>
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