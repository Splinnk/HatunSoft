<?php

include_once("conectar.php");

function autentificacion($e,$c){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT COUNT(*) cantidad FROM personal where email=? AND clave=? ");
    $consulta->execute(array($e,$c));
    $resultado=$consulta->fetch();
    return $resultado['cantidad'];
}

function reconocerUsuario($e,$c){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT cedula,rol FROM personal where email=? AND clave=? ");
    $consulta->execute(array($e,$c));
    $resultado=$consulta->fetch();
    return $resultado;
}
?>

