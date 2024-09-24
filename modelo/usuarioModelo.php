<?php

include_once "conexion.php";

class usuarioModelo{
    public static function mdlIniciarSesion($email,$password){

        $mensaje = array();

        try {
            $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE email = :email AND password = :password");
            $objRespuesta->bindParam(":email", $email);
            $objRespuesta->bindParam(":password", $password);
            $objRespuesta->execute();
            $objUsuario = $objRespuesta->fetch();

            if($objUsuario != null){
                $mensaje = array("codigo"=>"200","mensaje"=>"ok");
                $_SESSION["usuario"] = $objUsuario["nombre"] . " " . $objUsuario["apellido"];
                $_SESSION["idUsuario"] = $objUsuario["idUsuario"];
            }else{
                $mensaje = array("codigo" => "401", "mensaje" => "El usuario no existe, por favor verifique sus datos");
            }
            $objRespuesta = null;
        } catch (Exception $e) {
            $mensaje = array("codigo" => "401", "mensaje",$e->getMessage());
        }
        return $mensaje;
    }
}