<?php
include_once("../base/consultas.php");


if(isset($_POST['c'])){
    $correo=$_POST['u'];
    $clave=$_POST['c'];

    if(isset($_SESSION)){
        $_SESSION['user']="";
        $_SESSION['rol']="";
    }else{
        session_start();
        $_SESSION['user']="";
        $_SESSION['rol']="";
    }

    if(autentificacion($correo, $clave)==1){
        $identificacion=reconocerUsuario($correo,$clave);
        $_SESSION['user']=$identificacion['cedula'];
        $_SESSION['rol']=$identificacion['rol'];
        echo 1;
    }else{
        echo 0;
    }
}
?>
