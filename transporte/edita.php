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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include '../conexion.php';

        $sql = "SELECT id_transporte, id_usuario, nombre_transporte, ruta_transporte, horario_transporte, precio_transporte FROM transportes WHERE id_transporte = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_usuario = $row['id_usuario'];
            $nombre_transporte = $row['nombre_transporte'];
            $ruta_transporte = $row['ruta_transporte'];
            $horario_transporte = $row['horario_transporte'];
            $precio_transporte = $row['precio_transporte'];
        } else {
            echo "No se encontró el transporte.";
        }
        $conexion->close();
    } else {
        echo "No se proporcionó el ID de transporte.";
    }
    ?>

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Editar transporte</h3>

            <form action="#" class="row g-3" method="POST">
                <input type="hidden" name="id_transporte" value="<?php echo htmlspecialchars($id); ?>">

                <div class="col-md-6">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <?php
                        include '../conexion.php';
                        $sql = "SELECT id_usuario, nombre_usuario FROM usuario";
                        $result = $conexion->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['id_usuario'] == $id_usuario) ? 'selected' : '';
                                echo "<option value=\"" . htmlspecialchars($row['id_usuario']) . "\" $selected>" . htmlspecialchars($row['nombre_usuario']) . "</option>";
                            }
                        } else {
                            echo "<option value=\"\">No hay usuarios disponibles</option>";
                        }

                        $conexion->close();
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="nombre_transporte" class="form-label">Nombre Transporte</label>
                    <input type="text" class="form-control" id="nombre_transporte" name="nombre_transporte"
                        value="<?php echo htmlspecialchars($nombre_transporte); ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="ruta_transporte" class="form-label">Ruta Transporte</label>
                    <input type="text" class="form-control" id="ruta_transporte" name="ruta_transporte"
                        value="<?php echo htmlspecialchars($ruta_transporte); ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="precio_transporte" class="form-label">Precio Transporte</label>
                    <input type="text" class="form-control" id="precio_transporte" name="precio_transporte"
                        value="<?php echo htmlspecialchars($precio_transporte); ?>" required>
                </div>

                <div class="col-md-12">
                    <label for="horario_transporte" class="form-label">Horario Transporte</label>
                    <textarea class="form-control" id="horario_transporte" name="horario_transporte" rows="5"
                        required><?php echo htmlspecialchars($horario_transporte); ?></textarea>
                </div>

                <div class="col-12">
                    <a href="../transporte/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </main>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_transporte = $_POST['id_transporte'];
        $id_usuario = $_POST['id_usuario'];
        $nombre_transporte = $_POST['nombre_transporte'];
        $ruta_transporte = $_POST['ruta_transporte'];
        $horario_transporte = $_POST['horario_transporte'];
        $precio_transporte = $_POST['precio_transporte'];

        include '../conexion.php';

        $sql = "UPDATE transportes SET id_usuario = ?, nombre_transporte = ?, ruta_transporte = ?, horario_transporte = ?, precio_transporte = ? WHERE id_transporte = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi", $id_usuario, $nombre_transporte, $ruta_transporte, $horario_transporte, $precio_transporte, $id_transporte);
        
        if ($stmt->execute()) {
            echo "<script>
                    window.addEventListener('load', function() {
                        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                        myModal.show();
                    });
                  </script>";
        } else {
            echo "Error actualizando registro: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    }
    ?>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Actualización exitosa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    El registro fue actualizado con éxito.
                </div>
                <div class="modal-footer">
                    <a href="listado.php" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4"></div>

    <footer class="footer" style="background-color:#217C61; position: fixed; bottom: 0; width: 100%;"
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
