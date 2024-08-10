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
        <div class="expertscard">
            <h1 style="text-align: center;">Green Wolf</h1>
            <br>
            <div>
                <div class="container content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div>
                                <h3 class="card-title">¿Quiénes Son?</h3>
                                <p class="card-text">Green Wolf Costa Rica es un movimiento integral, inclusivo y sostenible, que busca la recuperación socio-ecosistémica de Costa Rica a través de la acción y alianzas intersectoriales.</p>
                                <br>
                                <h3 class="card-title">Historia</h3>
                                <p class="card-text">Nacemos a partir de la preocupación de nuestro fundador, Ellian Villalobos, por la creciente contaminación de los ecosistemas costarricenses. Por esto, un 15 de diciembre de 2018 funda Green Wolf Costa Rica.</p>
                                <br>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <h3 class="card-title">Puntos de Contacto</h3>
                                <a href="https://www.instagram.com/greenwolfcr/" class="btn bi bi-instagram large-icon" target="_blank"></a>
                                <a href="https://x.com/greenwolfcr?lang=en" class="btn bi bi-twitter-x large-icon" target="_blank"></a>
                                <a href="https://www.youtube.com/channel/UC6NRa0FDOb3pEx7xmX5P9fQ" class="btn bi bi-youtube large-icon" target="_blank"></a>
                                <a href="https://www.facebook.com/GreenWolfCR" class="btn bi bi-facebook large-icon" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="expertscard">
            <h1 style="text-align: center;">Lorem ipsum dolor sit amet</h1>
            <br>
            <div>
                <div class="container content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div>
                                <h3 class="card-title">Lorem ipsum dolor sit amet</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit integer venenatis semper malesuada, id nisi curabitur himenaeos aliquam in magna cras laoreet</p>
                                <br>
                                <h3 class="card-title">Lorem ipsum dolor sit amet</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipiscing elit integer venenatis semper malesuada, id nisi curabitur himenaeos aliquam in magna cras laoreet</p>
                                <br>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div>
                                <h3 class="card-title">Puntos de Contacto</h3>
                                <a href="" class="btn bi bi-instagram large-icon" target="_blank"></a>
                                <a href="" class="btn bi bi-twitter-x large-icon" target="_blank"></a>
                                <a href="" class="btn bi bi-youtube large-icon" target="_blank"></a>
                                <a href="" class="btn bi bi-facebook large-icon" target="_blank"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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