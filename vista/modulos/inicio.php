<div id="i">
    <div class="content-body">
        <header>
            <?php
            if (isset($_SESSION["usuario"])) {
                echo "<h5>Bienvenido, " . htmlspecialchars($_SESSION["usuario"]) . "</h5>";
            } else {
                echo "<h5>Bienvenido</h5>";
            }
            ?>
            <nav>
                <button class="btn" onclick="window.location.href='login';">Login</button>
                <button class="btn" onclick="window.location.href='producto';">Registro de productos</button>
                <button class="btn" onclick="window.location.href='misproductos';">Mis productos</button>
                <button class="btn" onclick="window.location.href='cerrarSesion';">Cerrar Sesión</button>
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <div class="row" id="productosContainer">
                    <?php
                    // Llamar al modelo para obtener productos
                    include_once "modelo/usuarioModelo.php";
                    $productos = usuarioModelo::mdlObtenerProductos();

                    foreach ($productos as $producto) {
                        // Check if the 'telefono' key exists in the product array
                        if (isset($producto["telefono"])) {
                            // Generar enlace de WhatsApp Web con el número de teléfono del producto
                            $whatsappLink = "https://wa.me/" . $producto["telefono"];
                            $buttonText = "Contactar por WhatsApp";
                        } else {
                            // If 'telefono' is not set, set a default link and text
                            $whatsappLink = "#"; // Placeholder or an alert message
                            $buttonText = "Número no disponible";
                        }

                        echo "
                        <div class='col-md-4'>
                            <div class='card'>
                                <img src='uploads/{$producto["imagen"]}' class='card-img-top' alt='imagen'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$producto["titulo"]}</h5>
                                    <p class='card-text'>{$producto["descripcion"]}</p>
                                    <a href='{$whatsappLink}' target='_blank' class='btn-whatsapp'>
                                        {$buttonText}
                                    </a>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #736d74;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #575d9e;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            background-color: #b3b3b3;
            border: none;
            border-radius: 25px;
            color: white;
            padding: 10px 15px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #e7e7eb;
            transform: scale(1.1);
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: white;
            padding: 10px 15px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-whatsapp:hover {
            background-color: #1ebe55;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            background-color: white;
        }

        .card:hover {
            transform: scale(1.07);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }
    </style>
</div>