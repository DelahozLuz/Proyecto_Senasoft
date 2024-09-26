<?php

session_start();

include_once "../modelo/usuarioModelo.php";

class usuarioControlador
{
    public $idUsuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $nombreProducto;
    public $descripcion;
    public $imagen;
    public $estado;
    public $categoria;
    public $idProducto; // Correcto para manejar la eliminación

    public function ctrIniciarSesion()
    {
        $objRespuesta = usuarioModelo::mdlIniciarSesion(
            $this->email,
            $this->password
        );
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarUsuario()
    {
        $objRespuesta = usuarioModelo::mdlRegistroUsuario(
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->email,
            $this->password
        );
        echo json_encode($objRespuesta);
    }

    public function ctrRegistrarProducto()
    {
        // Llamar a la función del modelo que registra el producto
        $objRespuesta = usuarioModelo::mdlProducto(
            $this->nombreProducto,
            $this->descripcion,
            $this->estado,
            $this->imagen,
            $this->categoria,
            $this->idUsuario
        );
        echo json_encode($objRespuesta);
    }

    public function ctrmisProductos()
    {
        $productos = usuarioModelo::mdlmisProductos($this->idUsuario);
        echo json_encode($productos);
    }

    public function ctrEliminarProducto()
    {
        $objRespuesta = usuarioModelo::mdlEliminarProducto($this->idProducto);
        echo json_encode($objRespuesta);
    }
}

// Iniciar sesión
if (isset($_POST["iniciarSesion"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->email = $_POST["email"];
    $objUsuario->password = $_POST["password"];
    $objUsuario->ctrIniciarSesion();
}

// Registrar usuario
if (isset($_POST["registrarUsuario"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->nombre = $_POST["nombre"];
    $objUsuario->apellido = $_POST["apellido"];
    $objUsuario->telefono = $_POST["telefono"];
    $objUsuario->email = $_POST["email"];
    $objUsuario->password = $_POST["password"];
    $objUsuario->ctrRegistrarUsuario();
}

// Registrar producto
if (isset($_POST["registrarProducto"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->nombreProducto = $_POST["nombreProducto"];
    $objUsuario->descripcion = $_POST["descripcion"];

    // Verificar si se ha subido una imagen
    if ($_FILES['imagen']['error'] == 0) {
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $rutaDestino = "../uploads/" . $nombreImagen;

        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            $objUsuario->imagen = $nombreImagen;
        } else {
            echo json_encode(["codigo" => "401", "mensaje" => "Error al subir la imagen"]);
            return;
        }
    } else {
        echo json_encode(["codigo" => "401", "mensaje" => "No se ha subido ninguna imagen"]);
        return;
    }

    $objUsuario->estado = $_POST["estado"];
    $objUsuario->categoria = $_POST["categoria"];
    $objUsuario->idUsuario = $_POST["idUsuario"];

    $objUsuario->ctrRegistrarProducto();
}

if (isset($_POST["misProductos"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->idUsuario = $_POST["idUsuario"];
    $objUsuario->ctrmisProductos();
}

if (isset($_POST["eliminarProducto"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->idProducto = $_POST["idArticulo"]; // Ahora usando idProducto
    $objUsuario->ctrEliminarProducto();
}
