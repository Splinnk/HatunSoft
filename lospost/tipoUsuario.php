<?php

session_start();

if($_SESSION['cargo']=='administrador'){
    header('Location: ../pagina/prinAdmin.php');
}else{
    if($_SESSION['cargo']=='gerente'){
        header('Location: ../pagina/prinGer.php');
    }else{
        if($_SESSION['cargo']=='miembro'){
            header('Location: ../pagina/prinMiem.php');
        }    }   
}

?>
