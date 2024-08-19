<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Galeria</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <div class="container container-fluid p-0">
        <div class="container mt-5">
            <h2>Proyectos Realizados</h2>
            <h5>Proyectos concluidos por nuestra comunidad y usuarios participando y formando parte de cada una de nuestras experiencias.</h5>
            <br>
            <div class="row">
                <?php
                    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }
                    $sql = "SELECT g.id_imagen, g.id_usuario, g.titulo, g.imagen, u.nombre_usuario 
                            FROM galeria g 
                            INNER JOIN usuario u ON g.id_usuario = u.id_usuario";
                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id_imagen = $row['id_imagen'];
                            $id_usuario = $row['id_usuario'];
                            $titulo = $row['titulo'];
                            $imagen = $row['imagen'];
                            $nombre_usuario = $row['nombre_usuario'];
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="<?php echo $imagen; ?>">
                            <img src="<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>" class="img-fluid">
                        </a>
                        <div class="desc"><?php echo $titulo; ?> (Usuario: <?php echo htmlspecialchars($nombre_usuario); ?>)</div>
                    </div>
                 </div>
                 <?php
                        }
                    } else {
                        echo "<p>No se encontraron proyectos.</p>";
                    }
                    $stmt->close();
                    $conexion->close();
                ?>
            </div>
            <div class="clearfix"></div>
            <div style="padding:6px;">
                <p>¡Gracias por tu valiosa colaboración en los servicios de limpieza del medio ambiente! Tu compromiso y dedicación marcan una gran diferencia en la preservación de nuestro planeta. Juntos, estamos creando un futuro más limpio y saludable para todos. ¡Apreciamos profundamente tu esfuerzo y espíritu solidario!</p>
            </div>
        </div>
    </div>
    <div class="p-4"></div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;" class="col text-center text-white mt-auto p-1">
        <div class="container">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>

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
