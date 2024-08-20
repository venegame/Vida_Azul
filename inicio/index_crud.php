<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <title>Menu Principal</title>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <section id="inicio">
        <div class="jumbotron-fluid text-center img_inicio" style="background-image: url('https://static.vecteezy.com/system/resources/previews/010/970/477/non_2x/nature-of-green-leaf-environment-ecology-greenery-wallpaper-free-photo.jpg');
             background-size: auto;
             color:#02020a;
             background-size: 100% 100%;
             padding: 58px 0;
             font-weight: bold;
            ">
            <div class="container">
                <h1 class="display-4" style="color: #112A26; font-size: 6rem; font-weight: bold;"><strong>Vida
                        Azul</strong></h1>
                <p class="lead" style="color: #112A26; font-size: 1.5rem; font-weight: bold;"><strong>Conecta, Aprende,
                        Actúa</strong></p>
            </div>
        </div>
    </section>

    <div class="container container-fluid p-0">
        <div class="container mt-5">
            <h2>Eventos</h2>
            <h5>¡Visualiza los eventos de tu interés e inscríbete!</h5>
            <br>
            <div class="row">
                <?php

                // Crear conexión
                include '../conexion.php';


                // Consultar los 4 eventos más recientes
                $sql = "SELECT nombre_evento, fecha_evento, descripcion, imagen FROM eventos ORDER BY fecha_evento ASC LIMIT 4";
                $resultado = $conexion->query($sql);

                // Verificar si hay resultados
                if ($resultado->num_rows > 0) {
                    // Mostrar eventos
                    while ($eventos = $resultado->fetch_assoc()) {
                        echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">';
                        echo '<div class="gallery">';
                        echo '<a>';
                        echo '<img src="' . $eventos['imagen'] . '" alt="' . $eventos['nombre_evento'] . '" class="img-fluid">';
                        echo '</a>';
                        echo '<div class="desc">' . $eventos['descripcion'] . '</div>';
                        echo '<div class="center-btn">';
                        echo '<a href="infoEvento.html" class="btn btn-primary mt-2">Más información</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay eventos disponibles.</p>';
                }

                $conexion->close();
                ?>
            </div>
        </div>
    </div>

    <div class="p-4"></div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>
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
