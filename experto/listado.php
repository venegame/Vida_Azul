<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <title>Vida azul</title>
</head>

<body>
    <div id="navbar-placeholder"></div>
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3" id="titulo">Expertos</h3>
            <a href="nuevo.php" class="btn" style="background-color: #217C61; color: white;">Agregar</a>
            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead style="background-color: #112A26; color: white;">
                    <tr>
                        <th scope="col">ID Experto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre Experto</th>
                        <th scope="col">Quienes Somos</th>
                        <th scope="col">Historia</th>
                        <th scope="col">Links</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <?php
                include '../conexion.php';

                $sql = "SELECT id_experto, id_categoria, nombre_experto, quienes_somos, historia_expertos, url_instagram, url_x, url_youtube, url_facebook  FROM expertos";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id_experto'];
                        $id_categoria = $row['id_categoria'];
                        $nombre = $row['nombre_experto'];
                        $quienes_somos = $row['quienes_somos'];
                        $historia_expertos = $row['historia_expertos'];
                        $url_instagram = $row['url_instagram'];
                        $url_x = $row['url_x'];
                        $url_youtube = $row['url_youtube'];
                        $url_facebook = $row['url_facebook'];
                        ?>
                        <tbody>
                            <tr>
                                <td name="id" class="truncateless"><?php echo $id; ?></td>
                                <td name="id_categoria" class="truncateless"><?php echo $id_categoria; ?></td>
                                <td name="nombre" class="truncateless"><?php echo $nombre; ?></td>
                                <td name="quienes_somos" class="truncateless"><?php echo $quienes_somos; ?></td>
                                <td name="historia_expertos" class="truncateless"><?php echo $historia_expertos; ?></td>
                                <td name="Links" class="truncateless"><?php echo $url_instagram; ?> <br> <?php echo $url_x; ?>
                                    <br> <?php echo $url_youtube; ?> <br> <?php echo $url_facebook; ?></td>
                                <td style="display: flex; align-items: center;">
                                    <a href="edita.php?id=<?php echo $id; ?>" class="btn btn-sm me-2"
                                        style="background-color: #94C132; color: white;">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#eliminaModal" data-bs-id="<?php echo $id; ?>">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    echo "No se encontraron expertos, por favor intente nuevamente.";
                }
                $conexion->close();
                ?>
            </table>
        </div>
    </main>
    <div class="p-4"> </div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY;Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="elimina.php" method="post">
                        <input type="hidden" name="id_experto" id="id_experto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('../navbar_cruds.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
            const eliminaModal = document.getElementById('eliminaModal');
            if (eliminaModal) {
                eliminaModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-bs-id');
                    const form = eliminaModal.querySelector('#form-elimina');
                    form.querySelector('#id_experto').value = id;
                });
            }
        });
    </script>
</body>

</html>