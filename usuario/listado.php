<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <title>Vida Azul - Usuarios</title>
</head>

<body>
    <div id="navbar-placeholder"></div>

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3" id="titulo">Usuarios</h3>

            <a href="nuevo.php" class="btn" style="background-color: #217C61; color: white;">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead style="background-color: #112A26; color: white;">
                    <tr>
                        <th scope="col">ID Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Configuración de conexión a la base de datos
                    $host = 'localhost';
                    $usuario = 'vida_azul';
                    $contrasena = 'vidaazul';
                    $base_datos = 'vida_azul';

                    // Crear conexión
                    include '../conexion.php';


                    // Consultar todos los usuarios
                    $sql = "SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.correo, u.contrasenia, r.nombre_rol
                            FROM usuario u
                            LEFT JOIN rol r ON u.id_rol = r.id_rol";
                    $resultado = $conexion->query($sql);

                    // Verificar si hay resultados
                    if ($resultado->num_rows > 0) {
                        // Mostrar usuarios
                        while ($usuario = $resultado->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($usuario['id_usuario']) . '</td>';
                            echo '<td>' . htmlspecialchars($usuario['nombre_usuario']) . '</td>';
                            echo '<td>' . htmlspecialchars($usuario['apellido_usuario']) . '</td>';
                            echo '<td>' . htmlspecialchars($usuario['correo']) . '</td>';
                            echo '<td>******</td>'; // Ocultar la contraseña por razones de seguridad
                            echo '<td>' . htmlspecialchars($usuario['nombre_rol']) . '</td>';
                            echo '<td>';
                            echo '<a href="edita.php?id=' . htmlspecialchars($usuario['id_usuario']) . '" class="btn btn-sm me-2" style="background-color: #94C132; color: white;">Editar</a>';
                            echo '<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="' . htmlspecialchars($usuario['id_usuario']) . '">Eliminar</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No hay usuarios disponibles.</td></tr>';
                    }

                    $conexion->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <br>

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
        const eliminaModal = document.getElementById('eliminaModal');
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-bs-id');
                const form = eliminaModal.querySelector('#form-elimina');
                form.setAttribute('action', 'elimina.php?id=' + id);
            });
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
