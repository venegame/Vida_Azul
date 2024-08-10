<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Recursos</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            $sql = "SELECT nombre_recurso, descripcion, imagen FROM recursos WHERE id_recurso = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombre = $row['nombre_recurso'];
                $descripcion = $row['descripcion'];
                $imagen = $row['imagen'];
            }
            $conexion->close();
        } else {
            echo "No se encontro el ID de recurso.";
        }
    ?>
    <div class="row align-items-center content">
        <div class="col-lg-8">
            <h2 class="card-title" name="nombre"><?php echo $nombre; ?></h2>
            <br>
            <p class="card-text" name="descripcion"><?php echo nl2br(htmlspecialchars($descripcion)); ?></p>
            <br>
            <a href="recursos.php" class="btnrecursos"> Regresar</a>
        </div>
        <div class="col-lg-2">
            <img src="<?php echo $imagen; ?>" alt="Imagen del Recurso" width="250" height="200" name="imagen">
        </div>
    </div>
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
