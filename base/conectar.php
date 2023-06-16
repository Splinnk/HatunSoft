<?php 

    function conectar(){
        $servidor="localhost";
        $usuario="root";
        $clave="root";
        $baseDatos="hatunfinal";

        $con= new PDO('mysql:host='.$servidor.';dbname='.$baseDatos, $usuario, $clave);
        return $con;

    }

?>