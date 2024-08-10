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
    </nav>
    <div class="content">
        <h1>Transportes</h1>
        <br>
            <div class="content">
                <div class="card_green d-flex">
                    <div class="card-body">
                        <div class="container content">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Zona:</h4>
                                    <p class="card-text">San Jose</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Horarios:</h4>
                                    <p class="card-text">4:00 AM</p>
                                    <p class="card-text">4:15 AM</p>
                                    <p class="card-text">4:30 AM</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Costo:</h4>
                                    <p class="card-text">₡1600</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Servicios Adicionales:</h4>
                                    <p class="card-text">* Servicios Sanitarios</p>
                                    <p class="card-text">* Aire acondicionado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card_green d-flex">
                    <div class="card-body">
                        <div class="container content">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Zona:</h4>
                                    <p class="card-text">Heredia</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Horarios:</h4>
                                    <p class="card-text">5:00 AM</p>
                                    <p class="card-text">5:15 AM</p>
                                    <p class="card-text">5:30 AM</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Costo:</h4>
                                    <p class="card-text">₡1200</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title" style="color: #336B05;">Servicios Adicionales:</h4>
                                    <p class="card-text">* Servicios Sanitarios</p>
                                    <p class="card-text">* WIFI</p>
                                    <p class="card-text">* Aire acondicionado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <br>
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