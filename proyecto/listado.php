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
            <h3 class="my-3" id="titulo">Proyectos</h3>

            <a href="nuevo.php" class="btn" style="background-color: #217C61; color: white;">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead style="background-color: #112A26; color: white;">
                    <tr>
                        <th scope="col">ID Proyecto</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Nombre Proyecto</th>
                        <th scope="col">Detalle Proyecto</th>
                        <th scope="col">Estado Proyecto</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <?php
            include '../conexion.php';

                $sql = "SELECT p.id_proyecto, p.nombre_proyecto, u.nombre_usuario AS usuario, c.nombre_categoria AS categoria, p.detalle_proyecto, p.estado_proyecto 
        FROM proyecto p
        JOIN usuario u ON p.id_usuario = u.id_usuario
        JOIN categoria c ON p.id_categoria = c.id_categoria";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id_proyecto'];
                        $usuario = $row['usuario'];
                        $categoria = $row['categoria'];
                        $nombre = $row['nombre_proyecto'];
                        $detalle = $row['detalle_proyecto'];
                        $estado = $row['estado_proyecto'];
                        ?>
                        <tbody>
                            <tr>
                                <td name="id"><?php echo $id; ?></td>
                                <td name="usuario"><?php echo $usuario; ?></td>
                                <td name="categoria"><?php echo $categoria; ?></td>
                                <td name="nombre"><?php echo $nombre; ?></td>
                                <td name="detalle"><?php echo $detalle; ?></td>
                                <td name="estado"><?php echo $estado; ?></td>
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
                    echo "No se encontraron proyectos, por favor intente nuevamente.";
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
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')

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