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
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include '../conexion.php';

            // Obtener la información de la imagen a editar
            $sql = "SELECT id_imagen, id_usuario, titulo, imagen FROM galeria WHERE id_imagen = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id_imagen = $row['id_imagen'];
                $id_usuario = $row['id_usuario'];
                $titulo = $row['titulo'];
                $imagen = $row['imagen'];
            }
            $conexion->close();
        } else {
            echo "No se encontró el ID de la galería.";
        }

        // Obtener la lista de usuarios para el dropdown
        include '../conexion.php';
        $usuarios_query = "SELECT id_usuario, nombre_usuario FROM usuario";
        $usuarios_result = $conexion->query($usuarios_query);
        $usuarios = [];
        if ($usuarios_result->num_rows > 0) {
            while ($row = $usuarios_result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        $conexion->close();
    ?>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_imagen = $_POST['id_imagen'];
            $id_usuario = $_POST['id_usuario'];
            $titulo = $_POST['titulo'];
            $imagen = $_POST['imagen'];

            include '../conexion.php';

            $sql = "UPDATE galeria SET id_usuario = ?, titulo = ?, imagen = ? WHERE id_imagen = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssi", $id_usuario, $titulo, $imagen, $id_imagen);

            if ($stmt->execute()) {
                echo "<script>
                        window.location.href = 'listado.php';
                      </script>";
            } else {
                echo "Error al actualizar el registro: " . $stmt->error;
            }

            $stmt->close();
            $conexion->close();
        }
    ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Editar publicación</h3>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row g-3" method="post">
                <div class="col-md-4">
                    <label for="id_imagen" class="form-label">ID Imagen</label>
                    <input type="text" class="form-control" id="id_imagen" name="id_imagen" required readonly value="<?php echo isset($id_imagen) ? $id_imagen : ''; ?>">
                </div>

                <div class="col-md-4">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select id="id_usuario" name="id_usuario" class="form-select" required>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?php echo $usuario['id_usuario']; ?>" <?php echo $usuario['id_usuario'] == $id_usuario ? 'selected' : ''; ?>>
                                <?php echo $usuario['nombre_usuario']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="titulo" class="form-label">Título Imagen</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required value="<?php echo isset($titulo) ? $titulo : ''; ?>">
                </div>

                <div class="col-md-4">
                    <label for="imagen" class="form-label">Imagen URL</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required value="<?php echo isset($imagen) ? $imagen : ''; ?>">
                </div>

                <div class="col-12">
                    <a href="../galeria/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY; Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
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
