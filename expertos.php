<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Expertos</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <div class="container-fluid p-0">
        <img src="https://d2xuzatlfjyc9k.cloudfront.net/wp-content/uploads/2014/05/9-Best-Costa-RIca-National-Parks-and-Reserves-1.jpg" class="img-fluid w-100" alt="Responsive image">
    </div>
    <div class="container container-fluid p-0">
        <br>
        <?php
            $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            $sql = "SELECT id_experto, categoria, nombre_experto, quienes_somos, historia_expertos, url_instagram, url_x, url_youtube, url_facebook  FROM expertos";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id_experto'];
                    $categoria = $row['categoria'];
                    $nombre_experto = $row['nombre_experto'];
                    $quienes_somos = $row['quienes_somos'];
                    $historia_expertos = $row['historia_expertos'];
                    $url_instagram = $row['url_instagram'];
                    $url_x = $row['url_x'];
                    $url_youtube = $row['url_youtube'];
                    $url_facebook = $row['url_facebook'];
        ?>
        <div class="expertscard">
            <h1 style="text-align: center;"><?php echo htmlspecialchars($nombre_experto); ?></h1>
            <br>
            <div>
                <div class="container content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div>
                                <h3 class="card-title">¿Quiénes Son?</h3>
                                <p><?php echo nl2br(htmlspecialchars($quienes_somos)); ?></p>
                                <br>
                                <h3 class="card-title">Historia</h3>
                                <p><?php echo nl2br(htmlspecialchars($historia_expertos)); ?></p>
                                <br>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <h3 class="card-title">Puntos de Contacto</h3>
                                <a href="<?php echo $url_instagram; ?>" class="btn bi bi-instagram large-icon" target="_blank"></a>
                                <a href="<?php echo $url_x; ?>" class="btn bi bi-twitter-x large-icon" target="_blank"></a>
                                <a href="<?php echo $url_youtube; ?>" class="btn bi bi-youtube large-icon" target="_blank"></a>
                                <a href="<?php echo $url_facebook; ?>" class="btn bi bi-facebook large-icon" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            } else {
                echo "No se encontraron expertos, por favor intente nuevamente.";
            }

            $stmt->close();
            $conexion->close();
        ?> 
    </div>
    <br>
    <div class="p-4"> </div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>
</body>
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
</html>