<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Opiniones - Vida Azul</title>
</head>

<body>
    <!-- Aquí se mostrarán el Navbar -->
    <div id="navbar-placeholder"></div>

    <div class="project-header">
        <img src="https://images.pexels.com/photos/3264779/pexels-photo-3264779.jpeg" alt="Vida Azul"
            class="project-image">
        <h2 class="centered">Opiniones</h2>
    </div>

    <div class="container my-4">
        <h2 class="text-center">Ayudanos a crecer, brindanos tu opinion</h2>

        <form id="commentForm" class="my-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Escribe tu comentario</label>
                <textarea class="form-control" id="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
        <div id="commentsSection">
            <!-- Aquí se mostrarán los comentarios -->
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&COPY;Vida Azul Derechos Reservados 2024</p>
        </div>
    </footer>
    <script>
        // Espera a que todo el contenido del DOM esté completamente cargado antes de ejecutar el script
        document.addEventListener('DOMContentLoaded', () => {
            // Obtiene el formulario de comentarios por su ID
            const commentForm = document.getElementById('commentForm');
            // Obtiene el campo de entrada del nombre por su ID
            const nameInput = document.getElementById('name');
            // Obtiene el campo de entrada del comentario por su ID
            const commentInput = document.getElementById('comment');
            // Obtiene la sección donde se mostrarán los comentarios por su ID
            const commentsSection = document.getElementById('commentsSection');

            // Agrega un evento al formulario para manejar el envío
            commentForm.addEventListener('submit', (e) => {
                // Previene el comportamiento predeterminado del formulario (recargar la página)
                e.preventDefault();
                // Obtiene y limpia los valores de los campos de entrada
                const name = nameInput.value.trim();
                const commentText = commentInput.value.trim();
                // Obtiene la fecha actual en formato local
                const date = new Date().toLocaleDateString();
                // Si el nombre y el comentario no están vacíos
                if (name && commentText) {
                    // Llama a la función para agregar el comentario
                    addComment(name, commentText, date);
                    // Limpia los campos de entrada
                    nameInput.value = '';
                    commentInput.value = '';
                }
            });

            // Función para agregar un nuevo comentario
            function addComment(name, text, date) {
                // Crea un nuevo div para la tarjeta del comentario
                const commentCard = document.createElement('div');
                // Agrega la clase 'comment-card' al div
                commentCard.classList.add('comment-card');

                // Crea un nuevo div para el encabezado del comentario
                const commentHeader = document.createElement('div');
                // Agrega la clase 'comment-header' al div
                commentHeader.classList.add('comment-header');

                // Crea un elemento 'strong' para el autor del comentario
                const commentAuthor = document.createElement('strong');
                // Establece el contenido de texto del autor con el nombre y la fecha
                commentAuthor.textContent = `${name} - ${date}`;

                // Crea un nuevo párrafo para el texto del comentario
                const commentText = document.createElement('p');
                // Agrega la clase 'comment-text' al párrafo
                commentText.classList.add('comment-text');
                // Establece el contenido de texto del párrafo con el comentario
                commentText.textContent = text;

                // Crea un nuevo div para las acciones del comentario (editar/eliminar)
                const commentActions = document.createElement('div');
                // Agrega la clase 'comment-actions' al div
                commentActions.classList.add('comment-actions');
                // Establece el contenido HTML del div con los íconos de edición y eliminación
                commentActions.innerHTML = `
                    <i class="bi bi-pencil-square edit-icon"></i>
                    <i class="bi bi-trash delete-icon"></i>
                `;

                // Añade el autor y las acciones al encabezado del comentario
                commentHeader.appendChild(commentAuthor);
                commentHeader.appendChild(commentActions);
                // Añade el encabezado y el texto del comentario a la tarjeta del comentario
                commentCard.appendChild(commentHeader);
                commentCard.appendChild(commentText);
                // Añade la tarjeta del comentario a la sección de comentarios
                commentsSection.appendChild(commentCard);

                // Selecciona el ícono de edición y le agrega un evento de clic para editar el comentario
                const editIcon = commentActions.querySelector('.edit-icon');
                // Selecciona el ícono de eliminación y le agrega un evento de clic para eliminar el comentario
                const deleteIcon = commentActions.querySelector('.delete-icon');

                // Evento para editar el comentario
                editIcon.addEventListener('click', () => editComment(commentCard, commentText));
                // Evento para eliminar el comentario
                deleteIcon.addEventListener('click', () => deleteComment(commentCard));
            }

            // Función para editar un comentario
            function editComment(card, textElement) {
                // Solicita al usuario que edite su comentario
                const newText = prompt('Edita tu comentario:', textElement.textContent);
                // Si el nuevo texto no es nulo, actualiza el contenido del comentario
                if (newText !== null) {
                    textElement.textContent = newText.trim();
                }
            }

            // Función para eliminar un comentario
            function deleteComment(card) {
                // Confirma si el usuario quiere eliminar el comentario
                if (confirm('¿Estás seguro de eliminar este comentario?')) {
                    // Elimina la tarjeta del comentario del DOM
                    card.remove();
                }
            }
        });
    </script>

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