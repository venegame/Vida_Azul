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
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/359823697_644929064334975_7103718428630239311_n.jpg">
                            <img src="a_Images/359823697_644929064334975_7103718428630239311_n.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/LIPIC2017062.jpg">
                            <img src="a_Images/LIPIC2017062.jpg" alt="Forest" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/DSCN0944.jpg">
                            <img src="a_Images/DSCN0944.jpg" alt="Northern Lights" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/siembradearboles_TDCX8006.jpg">
                            <img src="a_Images/siembradearboles_TDCX8006.jpg" alt="Mountains" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/beach_cleaning.jpg">
                            <img src="a_Images/beach_cleaning.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/368247914_685115020310273_7803577051522363633_n.jpg">
                            <img src="a_Images/368247914_685115020310273_7803577051522363633_n.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/Jornada-de-limpieza-Rio-Torres--scaled.jpg">
                            <img src="a_Images/Jornada-de-limpieza-Rio-Torres--scaled.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a target="_blank" href="a_Images/la-poma.jpg">
                            <img src="a_Images/la-poma.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                    </div>
                </div>
                <?php
                    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }
                    $sql = "SELECT id_imagen, id_usuario, titulo_imagen, imagen_url FROM galeria";
                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id_imagen = $row['id_imagen'];
                            $id_usuario = $row['id_usuario'];
                            $titulo_imagen = $row['titulo_imagen'];
                            $imagen_url = $row['imagen_url'];
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-user-id="<?php echo $id_usuario; ?>">
                    <div class="gallery">
                        <a target="_blank" href="<?php echo $imagen_url; ?>">
                            <img src="<?php echo $imagen_url; ?>" alt="<?php echo $titulo_imagen; ?>" class="img-fluid">
                        </a>
                        <div class="desc"><?php echo $titulo_imagen; ?> (Usuario: <?php echo $id_usuario; ?>)</div>
                    </div>
                 </div>
                 <?php
                        }
                    } else {
                        echo "";
                    }
                    $stmt->close();
                    $conexion->close();
                ?>

            </div>
            <div class="clearfix"></div>
            <div style="padding:6px;">
                <p>This example uses media queries to re-arrange the images on different screen sizes: for screens larger than 700px wide, it will show four images side by side, for screens smaller than 700px, it will show two images side by side. For screens smaller than 500px, the images will stack vertically (100%).</p>
            </div>
        </div>
    </div>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;" class="col text-center text-white mt-auto p-1">
        <div class="container ">
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