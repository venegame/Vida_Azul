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
            <h3 class="my-3" id="titulo">Galeria</h3>

            <a href="nuevo.php" class="btn" style="background-color: #217C61; color: white;">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead style="background-color: #112A26; color: white;">
                    <tr>
                        <th scope="col">ID Imagen</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Título Imagen</th>
                        <th scope="col">Imagen URL</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <?php
                    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }
                    $sql = "SELECT id_imagen, id_usuario, titulo, imagen FROM galeria";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id_imagen = $row['id_imagen'];
                            $id_usuario = $row['id_usuario'];
                            $titulo = $row['titulo'];
                            $imagen = $row['imagen'];
                ?>

                <tbody>
                    <tr>
                        <td name="id_imagen" class="truncate2"><?php echo $id_imagen; ?></td>
                        <td name="id_usuario" class="truncate2"><?php echo $id_usuario; ?></td>
                        <td name="titulo" class="truncate2"><?php echo $titulo; ?></td>
                        <td name="imagen" class="truncate2"><?php echo $imagen; ?></td>
                        <td>
                            <a href="edita.php?id=<?php echo $id_imagen; ?>" class="btn btn-sm me-2"
                                style="background-color: #94C132; color: white;">Editar</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminaModal" data-bs-id="<?php echo $id_imagen; ?>">Eliminar</button>
                        </td>
                    </tr>

                </tbody>
                <?php
                        }
                    } else {
                        echo "No se encontraron imágenes, por favor ingrese alguna.";
                    }
                    $conexion->close();
                ?>
            </table>
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
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>

        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', 'elimina.php?id=' + id)
            })
        }
    </script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            fetch('../navbar_cruds.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('navbar-placeholder').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el navbar:', error));
        });
    </script>


</body>

</html>