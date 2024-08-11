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
            $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            $sql = "SELECT categoria, nombre_experto, quienes_somos, historia_expertos, url_instagram, url_x, url_youtube, url_facebook  FROM expertos WHERE id_experto = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $categoria = $row['categoria'];
                $nombre_experto = $row['nombre_experto'];
                $quienes_somos = $row['quienes_somos'];
                $historia_expertos = $row['historia_expertos'];
                $url_instagram = $row['url_instagram'];
                $url_x = $row['url_x'];
                $url_youtube = $row['url_youtube'];
                $url_facebook = $row['url_facebook'];
            }
            $conexion->close();
        } else {
            echo "No se encontro el ID de experto.";
        }
    ?>
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Editar experto</h3>
            <form action="#" class="row g-3" method="POST">
                <div class="col-md-2">
                    <label for="id_experto" class="form-label">ID Experto</label>
                    <input type="text" class="form-control" name="id_experto" value="<?php echo $id; ?>" readonly></input>
                </div>
                <div class="col-md-4">
                    <label for="categoria" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value="<?php echo $categoria; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="nombre_experto" class="form-label">Nombre Experto</label>
                    <input type="text" class="form-control" name="nombre_experto" value="<?php echo $nombre_experto; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="quienes_somos" class="form-label">¿Quiénes Somos?</label>
                    <textarea class="form-control" name="quienes_somos" rows="5" required><?php echo htmlspecialchars($quienes_somos); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="historia_expertos" class="form-label">Historia</label>
                    <textarea class="form-control" name="historia_expertos" rows="5" required><?php echo htmlspecialchars($historia_expertos); ?></textarea>
                </div>
                <div class="col-md-3">
                    <label for="url_instagram" class="form-label">Instagram</label>
                    <input type="url" class="form-control" id="url_instagram" name="url_instagram" value="<?php echo $url_instagram; ?>">
                </div>
                <div class="col-md-3">
                    <label for="url_x" class="form-label">X (antes Twitter)</label>
                    <input type="url" class="form-control" id="url_x" name="url_x" value="<?php echo $url_x; ?>">
                </div>
                <div class="col-md-3">
                    <label for="url_youtube" class="form-label">YouTube</label>
                    <input type="url" class="form-control" id="url_youtube" name="url_youtube" value="<?php echo $url_youtube; ?>">
                </div>
                <div class="col-md-3">
                    <label for="url_facebook" class="form-label">Facebook</label>
                    <input type="url" class="form-control" id="url_facebook" name="url_facebook" value="<?php echo $url_facebook; ?>">
                </div>
                <div class="col-12">
                    <a href="../experto/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </main>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id_experto = $_POST['id_experto'];
            $categoria = $_POST['categoria'];
            $nombre_experto = $_POST['nombre_experto'];
            $quienes_somos = $_POST['quienes_somos'];
            $historia_expertos = $_POST['historia_expertos'];
            $url_instagram = $_POST['url_instagram'];
            $url_x = $_POST['url_x'];
            $url_youtube = $_POST['url_youtube'];
            $url_facebook = $_POST['url_facebook'];
            $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            $sql = "UPDATE expertos SET categoria = ?, nombre_experto = ?, quienes_somos = ?, historia_expertos = ?, url_instagram = ?, url_x = ?, url_youtube = ?, url_facebook = ? WHERE id_experto = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssssssi", $categoria, $nombre_experto, $quienes_somos, $historia_expertos, $url_instagram, $url_x, $url_youtube, $url_facebook, $id_experto);
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
    <div class="p-4"> </div>
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
        crossorigin="anonymous">
    </script>
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