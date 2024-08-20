<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Transportes</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <div class="content">
        <h1>Transportes</h1>
        <br>
            <div class="content">
                <?php
                    include 'conexion.php';

                    $sql = "SELECT id_transporte, id_usuario, nombre_transporte, ruta_transporte, horario_transporte, precio_transporte FROM transportes";
                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id_transporte'];
                            $id_usuario = $row['id_usuario'];
                            $nombre_transporte = $row['nombre_transporte'];
                            $ruta_transporte = $row['ruta_transporte'];
                            $horario_transporte = $row['horario_transporte'];
                            $precio_transporte = $row['precio_transporte'];
                ?>
                <div class="card_green d-flex">
                    <div class="card-body">
                        <div class="container content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="card-title" style="color: #336B05;">Zona:</h4>
                                    <p class="card-text"><?php echo $ruta_transporte; ?></p>
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="card-title" style="color: #336B05;">Horarios:</h4>
                                    <p class="card-text"><?php echo nl2br(htmlspecialchars($horario_transporte)); ?></p>
                                </div>
                                <div class="col-lg-4">
                                    <h4 class="card-title" style="color: #336B05;">Costo:</h4>
                                    <p class="card-text"><?php echo nl2br(htmlspecialchars($precio_transporte)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        echo "No se encontraron transportes, por favor intente nuevamente.";
                    }
                    $stmt->close();
                    $conexion->close();
                ?>
            </div>
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