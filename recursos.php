<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Recursos</title>
</head>
<body>
    <div id="navbar-placeholder"></div>
    <div class="content">
        <h1>Recursos</h1>
        <br>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <form method="GET" action="recursos.php" class="d-flex ms-auto">
                    <select class="form-select" name="filtrocategoria" onchange="this.form.submit()">
                        <option selected>Seleccionar filtro</option>
                        <option value="">Todos</option>
                        <option value="8">Artículos</option>
                        <option value="9">Cursos</option>
                    </select>
                    <button class="btn" type="button">
                        <i class="bi bi-funnel-fill" style="color: white;"></i>
                    </button>
                </form>
            </div>
        </nav>
    </div>
    <?php
        $conexion = new mysqli("localhost", "vida_azul", "vidaazul", "vida_azul");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        $filtrocategoria = isset($_GET['filtrocategoria']) ? $_GET['filtrocategoria'] : '';
        if ($filtrocategoria == NULL) {
            $sql = "SELECT id_recurso, nombre_recurso, descripcion, imagen FROM recursos";
            $stmt = $conexion->prepare($sql);
        } else {
            $sql = "SELECT id_recurso, nombre_recurso, descripcion, imagen FROM recursos WHERE id_categoria = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $filtrocategoria);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['id_recurso'];
                $nombre = $row['nombre_recurso'];
                $descripcion = $row['descripcion'];
                $imagen = $row['imagen'];
    ?>
        <div class="card content">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <h2 class="card-title"><?php echo htmlspecialchars($nombre); ?></h2>
                        <p class="card-text truncate"><?php echo htmlspecialchars($descripcion); ?></p>
                        <a href="inforecursos.php?id=<?php echo $id; ?>" class="btn">Ver más</a>
                    </div>
                    <div class="col-lg-1">
                        <img src="<?php echo htmlspecialchars($imagen); ?>" alt="Imagen del Recurso" width="250" height="200" class="float-start">
                    </div>
                </div>
            </div>
        </div>
    <?php
            }
        } else {
            echo "No se encontraron recursos, por favor intente nuevamente.";
        }

        $stmt->close();
        $conexion->close();
    ?> 
    <br>
    <div class="p-4"> </div>
    <footer class="footer" style="background-color:#217C61;position: fixed; bottom: 0;width: 100%;"
        class="col text-center text-white mt-auto p-1">
        <div class="container ">
            <div class="col">
                <p style="color: white;">&COPY; Vida Azul Derechos Reservados 2024</p>
            </div>
        </div>
    </footer>
</body>
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
</html>

