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
            $mensaje = array("codigo" => "401", "mensaje", $e->getMessage());
        }
        return $mensaje;
    }

}

class usuarioRegistro
{
    public static function mdlRegistroUsuario($nombre, $apellido, $telefono, $email, $password)
    {

        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("INSERT INTO usuario (nombre,apellido,telefono,email,password)VALUES(:nombre,:apellido,:telefono,:email,:password)");
            $objRespuesta->bindParam(":nombre", $nombre);
            $objRespuesta->bindParam(":apellido", $apellido);
            $objRespuesta->bindParam(":telefono", $telefono);
            $objRespuesta->bindParam(":email", $email);
            $objRespuesta->bindParam(":password", $password);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "El usuario se registro correctamente en la base de datos");
            } else {
                $mensaje = array("codigo" => "401", "mensaje" => "Error al registrar el usuario en la base de datos");
            }

        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", $e->getMessage());
        }
        return $mensaje;
    }
}