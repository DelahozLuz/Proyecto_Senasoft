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

    public function ctrIniciarSesion()
    {
        $objRespuesta = usuarioModelo::mdlIniciarSesion(
            $this->email,
            $this->password
        );
        echo json_encode($objRespuesta);
    }

}

if (isset($_POST["iniciarSesion"]) == "ok") {
    $objUsuario = new usuarioControlador();
    $objUsuario->email = $_POST["email"];
    $objUsuario->password = $_POST["password"];
    $objUsuario->ctrIniciarSesion();
}