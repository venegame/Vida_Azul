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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['id_transporte']) && !empty($_POST['id_transporte'])) {
                $id_transporte = $_POST['id_transporte'];
                $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }
                $sql = "DELETE FROM transportes WHERE id_transporte = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $id_transporte);
                if ($stmt->execute()) {
                    echo "<script>
                            window.addEventListener('load', function() {
                                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                                myModal.show();
                            });
                        </script>";
                } else {
                    echo "Error eliminando registro: " . $stmt->error;
                }
                $stmt->close();
                $conexion->close();
            } else {
                echo "ID del transporte no especificado.";
            }
        } else {
            echo "Método de solicitud no permitido.";
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
                    El registro fue eliminado con éxito.
                </div>
                <div class="modal-footer">
                    <a href="listado.php" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4"> </div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;" class="col text-center text-white mt-auto p-1">
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