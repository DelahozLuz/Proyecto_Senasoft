document.addEventListener("DOMContentLoaded", function () {
    const eliminarBtns = document.querySelectorAll(".eliminar-producto");

    eliminarBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            const idProducto = this.getAttribute("data-id"); // Obtén el id del producto
            
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                let formData = new FormData();
                formData.append("eliminarProducto", "ok");
                formData.append("idArticulo", idProducto); // Usa 'idArticulo' para mantener consistencia con el backend

                fetch("controlador/usuarioControlador.php", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data["mensaje"]);
                    if (data["codigo"] === "200") {
                        location.reload(); // Recargar la página para actualizar la lista de productos
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            }
        });
    });
});
