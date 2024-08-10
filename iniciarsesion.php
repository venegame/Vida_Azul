<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <section style="overflow-x: hidden;">
        <div class="row py-2 justify-content-center align-items-center">
            <div class="col-md-6 p-4">
                <div class="jumbotron-fluid text-center img_inicio" style="background-image: url('https://static.vecteezy.com/system/resources/previews/010/970/477/non_2x/nature-of-green-leaf-environment-ecology-greenery-wallpaper-free-photo.jpg');
                     background-size: cover; color: #02020a;
                     padding: 200px 0;
                     font-weight: bold;">
                    <div class="container">
                        <h1 class="display-4" style="color: #112A26; font-size: 6rem; font-weight: bold;"><strong>Vida
                                Azul</strong></h1>
                        <p class="lead" style="color: #112A26; font-size: 1.5rem; font-weight: bold;"><strong>Conecta,
                                Aprende, Actúa</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row py-2 justify-content-center">
                    <div class="col-md-12 py-4">
                        <a href="/index.html" class="btn btn-primary"
                            style="background-color: #32746D; border: none">
                            <i class="fas fa-arrow-left" style="background-color: #32746D"></i> Regresar
                        </a>
                    </div>
                </div>
                <div class="row py-2 justify-content-center">
                    <div class="col-md-12 py-4">
                        <div class="card-header" style="background-color: #32746D; color: white; text-align: center;">
                            <h2>Iniciar Sesión</h2>
                        </div>
                        <div class="card-body" style="padding: 2rem;">
                            <form method="post" action="/login">
                                <div class="mb-4">
                                    <input type="text" class="form-control form-control-lg" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        placeholder="Password">
                                </div>

                                <div class="mb-4">
                                    <a class="dropdown-item text-center mb-2" href="/registro.html">Regístrate</a>
                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-danger btn-lg" style="background-color: #32746D;
                                        border-color: #32746D; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">Iniciar
                                        Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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
            fetch('navbar.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>
</body>

</html>