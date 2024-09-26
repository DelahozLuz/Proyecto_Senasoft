<?php

include_once "conexion.php";

class usuarioModelo
{
    public static function mdlIniciarSesion($email, $password)
    {
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE email = :email AND password = :password");
            $objRespuesta->bindParam(":email", $email);
            $objRespuesta->bindParam(":password", $password);
            $objRespuesta->execute();
            $objUsuario = $objRespuesta->fetch();

            if ($objUsuario != null) {
                $mensaje = array("codigo" => "200", "mensaje" => "ok");
                $_SESSION["usuario"] = $objUsuario["nombre"] . " " . $objUsuario["apellido"];
                $_SESSION["idUsuario"] = $objUsuario["idUsuario"];
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "El usuario no existe, por favor verifique sus datos");
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlRegistroUsuario($nombre, $apellido, $telefono, $email, $password)
    {
        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario (nombre, apellido, telefono, email, password) VALUES (:nombre, :apellido, :telefono, :email, :password)");
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":apellido", $apellido);
            $objRespuesta->bindParam(":telefono", $telefono);
            $objRespuesta->bindParam(":email", $email);
            $objRespuesta->bindParam(":password", $password);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "El usuario se registró correctamente en la base de datos");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al registrar el usuario en la base de datos");
            }

        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlProducto($nombreProducto, $descripcion, $estado, $imagen, $categoria, $idUsuario)
    {
        $mensaje = array();

        try {
            // Verificar si la categoría ya existe
            $objRespuesta = Conexion::conectar()->prepare("SELECT idCategoria FROM categoria WHERE nombreCategoria = :nombreCategoria");
            $objRespuesta->bindParam(":nombreCategoria", $categoria);
            $objRespuesta->execute();
            $resultado = $objRespuesta->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Si la categoría existe, usar su idCategoria
                $idCategoria = $resultado['idCategoria'];
            } else {
                // Si la categoría no existe, insertar nueva categoría
                $objRespuesta = Conexion::conectar()->prepare("INSERT INTO categoria (nombreCategoria) VALUES (:nombreCategoria);");
                $objRespuesta->bindParam(":nombreCategoria", $categoria);
                $objRespuesta->execute();
                $idCategoria = Conexion::conectar()->lastInsertId(); // Captura el ID de la nueva categoría
            }

            // Ahora que tenemos el idCategoria correcto, insertar el producto
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO articulo (titulo, descripcion, imagen, estado, fecha_publicacion, idCategoria, idUsuario) VALUES (:titulo, :descripcion, :imagen, :estado, NOW(), :idCategoria, :idUsuario);");
            $objRespuesta->bindParam(":titulo", $nombreProducto);
            $objRespuesta->bindParam(":descripcion", $descripcion);
            $objRespuesta->bindParam(":imagen", $imagen);
            $objRespuesta->bindParam(":estado", $estado);
            $objRespuesta->bindParam(":idCategoria", $idCategoria); // Usa el idCategoria correcto
            $objRespuesta->bindParam(":idUsuario", $idUsuario);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "El producto se registró correctamente en la base de datos");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al registrar el producto en la base de datos");
            }

        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlmisProductos($idUsuario)
    {
        try {
            // Asegúrate de que el idUsuario sea pasado correctamente
            $objRespuesta = Conexion::conectar()->prepare("SELECT idArticulo, titulo, imagen, descripcion, estado FROM articulo WHERE idUsuario = :idUsuario");
            $objRespuesta->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $objRespuesta->execute();

            return $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return array();
        }
    }

    public static function mdlEliminarProducto($idProducto) // Aquí ya se corrige el uso de idProducto
    {
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("DELETE FROM articulo WHERE idArticulo = :idArticulo");
            $objRespuesta->bindParam(":idArticulo", $idProducto, PDO::PARAM_INT); // Cambiado para ser consistente

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Producto eliminado correctamente");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al eliminar el producto");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }

    public static function mdlObtenerProductos()
{
    try {
        $objRespuesta = Conexion::conectar()->prepare("
            SELECT a.titulo, a.descripcion, a.imagen, a.estado, u.telefono 
            FROM articulo a 
            INNER JOIN usuario u ON a.idUsuario = u.idUsuario
        ");
        $objRespuesta->execute();
        $productos = $objRespuesta->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    } catch (Exception $e) {
        return [];
    }
}
}
