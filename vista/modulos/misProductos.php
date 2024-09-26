<main>
    <div class="container mt-5">
        <div class="d-flex justify-content-start mb-4"> <!-- Flexbox para alineación a la izquierda -->
            <a href="inicio" class="btn btn-success">Regresar</a> <!-- Botón de regresar -->
        </div>
        <div class="row" id="productos">
            <?php
            include_once "modelo/usuarioModelo.php";

            if (isset($_SESSION['idUsuario'])) {
                $idUsuario = $_SESSION['idUsuario'];
                $misproductos = usuarioModelo::mdlmisProductos($idUsuario);

                foreach ($misproductos as $producto) {
                    echo "
                    <div class='col-md-4 mb-4'> <!-- Margen inferior para separación -->
                        <div class='card shadow-sm border-light'> <!-- Sombra y borde claro -->
                            <img src='uploads/{$producto["imagen"]}' class='card-img-top' alt='imagen' style='height: 200px; object-fit: cover;'> <!-- Ajustar altura de la imagen -->
                            <div class='card-body'>
                                <h5 class='card-title'>{$producto["titulo"]}</h5>
                                <p class='card-text'>{$producto["descripcion"]}</p>
                                <button class='btn btn-danger eliminar-producto' data-id='{$producto["idArticulo"]}'>Eliminar</button> <!-- Botón de eliminar -->   
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<script>
                    alert('No se encontró el usuario. Redirigiendo al inicio.');
                    window.location.href = 'inicio'; 
                </script>";
            }
            ?>
        </div>
    </div>
</main>


<script src="vista/js/misProductos.js"></script>

<!-- Estilos CSS personalizados -->
<style>
    /* Estilo general para el fondo */
    body {
        background-color: #736d74; /* Color de fondo claro */
    }

    /* Estilo para las tarjetas */
    .card {
        border-radius: 8px; /* Bordes redondeados */
        transition: transform 0.3s; /* Transición suave para el efecto hover */
    }

    .card:hover {
        transform: scale(1.05); /* Efecto de zoom al pasar el ratón */
    }

    /* Botón eliminar */
    .btn-danger {
        transition: background-color 0.3s; /* Transición suave para el color de fondo */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Color más oscuro en hover */
    }

    /* Espaciado adicional entre tarjetas */
    #productos {
        margin-top: 20px; /* Espacio entre el contenedor y las tarjetas */
    }
</style>