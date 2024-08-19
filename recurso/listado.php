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
            <h3 class="my-3" id="titulo">Recursos</h3>
            <a href="nuevo.php" class="btn" style="background-color: #217C61; color: white;">Agregar</a>
            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead style="background-color: #112A26; color: white;">
                    <tr>
                        <th scope="col">ID Recurso</th>
                        <th scope="col">Nombre Recurso</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <?php
                    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }
                    $sql = "SELECT id_recurso, nombre_recurso, id_categoria, descripcion, imagen FROM recursos";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id_recurso'];
                            $nombre = $row['nombre_recurso'];
                            $id_categoria = $row['id_categoria'];
                            $descripcion = $row['descripcion'];
                            $imagen = $row['imagen'];
                ?>
                <tbody>
                    <tr>
                        <td name="id" class="truncate2"><?php echo $id; ?></td>
                        <td name="nombre" class="truncate2"><?php echo $nombre; ?></td>
                        <td name="id_categoria" class="truncate2"><?php echo $id_categoria; ?></td>
                        <td name="descripcion" class="truncate2"><?php echo $descripcion; ?></td>
                        <td name="imagen" class="truncate2"><?php echo $imagen; ?></td>
                        <td style="display: flex; align-items: center;">
                            <a href="edita.php?id=<?php echo $id; ?>" class="btn btn-sm me-2"style="background-color: #94C132; color: white;">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?php echo $id; ?>">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
                <?php
                        }
                    } else {
                        echo "No se encontraron recursos, por favor intente nuevamente.";
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
                        <input type="hidden" name="id_recurso" id="id_recurso">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
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
                    form.querySelector('#id_recurso').value = id;
                });
            }
        });
    </script>
</body>
</html>
