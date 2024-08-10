<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Azul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <div id="navbar-placeholder"></div>


    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Nuevo evento</h3>

            <form action="#" class="row g-3" method="post" autocomplete="off">

               
                <div class="col-md-4">
                    <label for="id_evento" class="form-label">ID Evento</label>
                    <input type="text" class="form-control" id="id_evento" name="id_evento" required autofocus>
                </div>

                <div class="col-md-4">
                    <label for="nombre_evento" class="form-label">Nombre Evento</label>
                    <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required>
                </div>

                <div class="col-md-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>

                <div class="col-md-6">
                    <label for="imagen" class="form-label">Imagen URL</label>
                    <input type="text" class="form-control" id="imagen" name="imagen">
                </div>

                <div class="col-md-6">
                    <label for="fecha_evento" class="form-label">Fecha Evento</label>
                    <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
                </div>

                <div class="col-md-6">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="id_categoria" name="id_categoria" required>
                </div>


                <div class="col-12">
                    <a href="../evento/listado.html" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            fetch('../navbar_cruds.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>
</body>

</html>