<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Eventos</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <div class="container container-fluid p-0">
        <div class="container mt-5">
            <h2>Eventos</h2>
            <h5>Visualiza los eventos de tu interés e inscríbete!.</h5>
            <br>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/359823697_644929064334975_7103718428630239311_n.jpg" alt="Cinque Terre"
                                class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/LIPIC2017062.jpg" alt="Forest" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.html" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/DSCN0944.jpg" alt="Northern Lights" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/siembradearboles_TDCX8006.jpg" alt="Mountains" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/beach_cleaning.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/368247914_685115020310273_7803577051522363633_n.jpg" alt="Cinque Terre"
                                class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/Jornada-de-limpieza-Rio-Torres--scaled.jpg" alt="Cinque Terre"
                                class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="gallery">
                        <a>
                            <img src="a_Images/la-poma.jpg" alt="Cinque Terre" class="img-fluid">
                        </a>
                        <div class="desc">Add a description of the image here</div>
                        <div class="center-btn">
                            <a href="infoEvento.php" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
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
