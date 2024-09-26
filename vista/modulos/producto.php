<?php


// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    echo "<script>
        alert('¡Debes registrarte para poder registrar un producto!');
        window.location.href = 'inicio'; // Cambia 'registro' a la URL de tu página de registro
    </script>";
    exit; // Salir para evitar que el resto del código se ejecute
}
?>

<script src="vista/js/cl_usuario.js"></script>

<div id="Rp">
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-4 shadow" style="max-width: 600px; width: 100%;">
            <h1 class="text-center mb-4">Registra tu artículo</h1>
            <form class="row g-3 needs-validation" id="FormProducto" enctype="multipart/form-data" novalidate>
                <div class="col-md-12">
                    <label for="txtTituloArticulo" class="form-label">Título del artículo</label>
                    <input type="text" class="form-control" id="txtTituloArticulo" required>
                    <div class="invalid-feedback">Campo Requerido !!!</div>
                </div>
                <div class="col-md-12">
                    <label for="txtDescripcionArticulo" class="form-label">Descripción del artículo</label>
                    <textarea class="form-control" id="txtDescripcionArticulo" rows="4" required></textarea>
                    <div class="invalid-feedback">Campo Requerido !!!</div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="txtImagen" class="form-label">Subir imagen</label>
                        <input class="form-control" type="file" id="txtImagen" accept="image/*" required>
                        <div class="invalid-feedback">Campo Requerido !!!</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="selectEstadoArticulo" class="form-label">Estado del artículo</label>
                    <select class="form-select" id="selectEstadoArticulo" required>
                        <option value="">Selecciona el estado</option>
                        <option value="nuevo">Nuevo</option>
                        <option value="usado">Usado</option>
                    </select>
                    <div class="invalid-feedback">Campo Requerido !!!</div>
                </div>
                <div class="col-md-12">
                    <label for="selectCategoriaArticulo" class="form-label">Categoría del artículo</label>
                    <select class="form-select" id="selectCategoriaArticulo" required>
                        <option value="">Selecciona la categoría</option>
                        <option value="Electrodomésticos">Electrodomésticos</option>
                        <option value="Prendas">Prendas</option>
                        <option value="Calzado">Calzado</option>
                        <option value="Muebles">Muebles</option>
                    </select>
                    <div class="invalid-feedback">Campo Requerido !!!</div>
                </div>
                <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" type="submit">Registrar Artículo</button>
                    <a href="inicio" class="btn btn-success">Regresar</a> <!-- Botón de regresar -->
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vista/js/producto.js"></script>

<style>
    h1 {
        color: #007bff;
    }
    .btn-primary {
        background-color: #007bff; 
        border: none; 
        transition: background-color 0.3s; 
    }
    .btn-primary:hover {
        background-color: #0056b3; 
    }
    body {
        background-color: #736d74;
    }
</style>