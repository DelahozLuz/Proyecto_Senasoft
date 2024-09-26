(function () {
    'use strict';

    var forms = document.querySelectorAll('#FormProducto');

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                if (!form.checkValidity()) {
                    event.stopPropagation();
                    form.classList.add('was-validated');
                } else {
                    let nombreProducto = document.getElementById("txtTituloArticulo").value;
                    let descripcion = document.getElementById("txtDescripcionArticulo").value;
                    let imagen = document.getElementById("txtImagen").files[0];
                    let estado = document.getElementById("selectEstadoArticulo").value;
                    let categoria = document.getElementById("selectCategoriaArticulo").value;
                    let idUsuario = document.getElementById("idUsuario").value;

                    let formData = new FormData();
                    formData.append("registrarProducto", "ok");
                    formData.append("nombreProducto", nombreProducto);
                    formData.append("descripcion", descripcion);
                    formData.append("imagen", imagen);
                    formData.append("estado", estado);
                    formData.append("categoria", categoria);
                    formData.append("idUsuario", idUsuario);

                    fetch("controlador/usuarioControlador.php", {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(response => {
                        alert(response["mensaje"]);
                        // Redirigir a inicio para mostrar los productos actualizados
                        window.location.href = 'inicio';
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
            }, false);
        });
})();
