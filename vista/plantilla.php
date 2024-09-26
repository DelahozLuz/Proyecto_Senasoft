<?php

session_start();

include_once "vista/modulos/cabecera.php";

if (!isset($_GET["ruta"]) || $_GET["ruta"] == "") {
    $_GET["ruta"] = "inicio"; 
}

if (
    $_GET["ruta"] == "registro" ||
    $_GET["ruta"] == "inicio" ||
    $_GET["ruta"] == "cerrarSesion" ||
    $_GET["ruta"] == "login" ||
    $_GET["ruta"] == "producto" ||
    $_GET["ruta"] == "misproductos"
) {
    include_once "vista/modulos/" . $_GET["ruta"] . ".php";
} else {
    include_once "vista/modulos/404.php";
}

include_once "vista/modulos/pie.php";
