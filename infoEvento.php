<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Información del Evento</title>
    <style>
         footer {
            background-color: #217C61;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include 'conexion.php';

        $sql = "SELECT nombre_evento, descripcion, imagen FROM eventos WHERE id_evento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_evento = $row['nombre_evento'];
            $descripcion = $row['descripcion'];
            $imagen = $row['imagen'];
        } else {
            echo "<p>No se encontró el evento.</p>";
        }
        $conexion->close();
    } else {
        echo "<p>No se proporcionó un ID de evento.</p>";
    }
    ?>

    <main>
        <section id="contenido" class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <article class="font-large">
                        <h2 style="text-align: center;"><?php echo isset($nombre_evento) ? htmlspecialchars($nombre_evento) : ''; ?></h2>
                        <p style="text-align: center;"><?php echo isset($descripcion) ? nl2br(htmlspecialchars($descripcion)) : ''; ?></p>
                        <div class="text-center-custom">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#inscripcionModal">Inscribirse</button>
                        </div>
                    </article>
                </div>

                <div class="col-md-5 text-center">
                    <img src="<?php echo isset($imagen) ? htmlspecialchars($imagen) : ''; ?>" alt="Imagen del Evento" class="img-fluid">
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="inscripcionModal" tabindex="-1" aria-labelledby="inscripcionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscripcionModalLabel">Formulario de inscripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="contactus" action="" method="post">
                        <div class="desc">Si desea ser parte de este evento debes enviar un correo a
                            somosvidaazul@vidaazul.com con la siguiente información:</div>
                        <br>
                        <div class="desc">Nombre completo.</div>
                        <div class="desc">Cédula.</div>
                        <div class="desc">Correo electrónico.</div>
                        <div class="desc">Número telefónico.</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&COPY;Vida Azul Derechos Reservados 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlGCsk/IQORQOQqLkL04/6i5LZ/iYF8QcfGIDZ/tA6xCZ/hYX0dSOiBIc3A"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIphbu/KG3BptbB4Ks03/6AKeZ5p3npZZ5d9Bkk5lF5Ypa0D1z4N5N1Mjw7fA6"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('navbar.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>
</body>

</html>
