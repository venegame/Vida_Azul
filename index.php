<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Menu Principal</title>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <section id="inicio">
        <div class="jumbotron-fluid text-center img_inicio" style=" background-image: url('https://static.vecteezy.com/system/resources/previews/010/970/477/non_2x/nature-of-green-leaf-environment-ecology-greenery-wallpaper-free-photo.jpg');
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
                            <a href="infoEvento.html" class="btn btn-primary mt-2">Más información</a>
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
                            <a href="infoEvento.html" class="btn btn-primary mt-2">Más información</a>
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
                            <a href="infoEvento.html" class="btn btn-primary mt-2">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="p-4"> </div>
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