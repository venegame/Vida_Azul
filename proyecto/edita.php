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
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul", "3307");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Si se envía el formulario, procesar los datos
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_proyecto = $_POST['id_proyecto'];
        $nombre_proyecto = $_POST['nombre_proyecto'];
        $id_usuario = $_POST['id_usuario'];
        $id_categoria = $_POST['id_categoria'];
        $detalle_proyecto = $_POST['detalle_proyecto'];
        $estado_proyecto = $_POST['estado_proyecto'];

        // Actualizar el proyecto en la base de datos
        $sql = "UPDATE proyecto SET nombre_proyecto = ?, id_usuario = ?, id_categoria = ?, detalle_proyecto = ?, estado_proyecto = ? WHERE id_proyecto = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("siissi", $nombre_proyecto, $id_usuario, $id_categoria, $detalle_proyecto, $estado_proyecto, $id_proyecto);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success' role='alert'>Proyecto actualizado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al actualizar el proyecto: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    // Obtener los datos del proyecto si se recibe un id de proyecto por GET
    if (isset($_GET['id'])) {
        $id_proyecto = $_GET['id'];

        // Obtener los datos del proyecto
        $sql = "SELECT id_proyecto, nombre_proyecto, id_usuario, id_categoria, detalle_proyecto, estado_proyecto FROM proyecto WHERE id_proyecto = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_proyecto);
        $stmt->execute();
        $result = $stmt->get_result();
        $proyecto = $result->fetch_assoc();
        $stmt->close();
    }

    // Obtener las categorías
    $sql = "SELECT id_categoria, nombre_categoria FROM categoria";
    $categorias = $conexion->query($sql);

    // Obtener los usuarios
    $sql = "SELECT id_usuario, nombre_usuario FROM usuario";
    $usuarios = $conexion->query($sql);

    $conexion->close();
    ?>

    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">Editar proyecto</h3>

            <form method="POST" action="" class="row g-3">
                <input type="hidden" name="id_proyecto" value="<?php echo $proyecto['id_proyecto']; ?>">

                <div class="col-md-6">
                    <label for="nombre_proyecto" class="form-label">Nombre del Proyecto:</label>
                    <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto"
                           value="<?php echo $proyecto['nombre_proyecto']; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="id_usuario" class="form-label">Usuario:</label>
                    <select class="form-control" id="id_usuario" name="id_usuario" required>
                        <?php while ($usuario = $usuarios->fetch_assoc()): ?>
                            <option value="<?php echo $usuario['id_usuario']; ?>" <?php if ($usuario['id_usuario'] == $proyecto['id_usuario']) echo 'selected'; ?>>
                                <?php echo $usuario['nombre_usuario']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="id_categoria" class="form-label">Categoría:</label>
                    <select class="form-control" id="id_categoria" name="id_categoria" required>
                        <?php while ($categoria = $categorias->fetch_assoc()): ?>
                            <option value="<?php echo $categoria['id_categoria']; ?>" <?php if ($categoria['id_categoria'] == $proyecto['id_categoria']) echo 'selected'; ?>>
                                <?php echo $categoria['nombre_categoria']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="detalle_proyecto" class="form-label">Detalle del Proyecto:</label>
                    <textarea class="form-control" id="detalle_proyecto" name="detalle_proyecto" required><?php echo $proyecto['detalle_proyecto']; ?></textarea>
                </div>

                <div class="col-md-6">
                    <label for="estado_proyecto" class="form-label">Estado del Proyecto:</label>
                    <input type="text" class="form-control" id="estado_proyecto" name="estado_proyecto"
                           value="<?php echo $proyecto['estado_proyecto']; ?>" required>
                </div>

                <div class="col-12">
                    <a href="../proyecto/listado.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </main>

    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
            class="col text-center text-white mt-auto p-1">
        <div class="container">
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
