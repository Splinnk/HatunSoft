<?php

session_start();

if($_SESSION['rol']=='administrador'){
    header('Location: ../pagina/prinAdmin.php');
}else{
    if($_SESSION['rol']=='gerente'){
        header('Location: ../pagina/prinGer.php');
    }else{
        if($_SESSION['rol']=='miembro'){
            header('Location: ../pagina/prinMiem.php');
        }    }   
}

?>
