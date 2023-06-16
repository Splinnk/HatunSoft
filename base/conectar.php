<?php 

    function conectar(){
        $servidor="localhost";
        $usuario="root";
        $clave="root";
        $baseDatos="hatunsoft";

        $con= new PDO('mysql:host='.$servidor.';dbname='.$baseDatos, $usuario, $clave);
        return $con;

    }

?>