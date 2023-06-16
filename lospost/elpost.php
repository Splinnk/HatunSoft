<?php
include_once("../base/consultas.php");


if(isset($_POST['c'])){
    $correo=$_POST['u'];
    $clave=$_POST['c'];

    if(isset($_SESSION)){
        $_SESSION['user']="";
        $_SESSION['cargo']="";
    }else{
        session_start();
        $_SESSION['user']="";
        $_SESSION['cargo']="";
    }

    if(autentificacion($correo, $clave)==1){
        $identificacion=reconocerUsuario($correo,$clave);
        $_SESSION['user']=$identificacion['cedula'];
        $_SESSION['cargo']=$identificacion['rol'];
        echo 1;
    }else{
        echo 0;
    }
}

if(isset($_POST['matricularme_materia'])){

    $codigoMateria=$_POST['matricularme_materia'];
    session_start();

    echo matricularme($codigoMateria,$_SESSION['user']);

}

if(isset($_POST['dni_eliminar'])){

    $eliminar=$_POST['dni_eliminar'];

    eliminarUsuario($eliminar);

}

if(isset($_POST['dni_creacion'])){

    $dni=$_POST['dni_creacion'];
    $nom=$_POST['nom1_creacion'];
    $nom2=$_POST['nom2_creacion'];
    $ape=$_POST['ape1_creacion'];
    $ape2=$_POST['ape2_creacion'];
    $em=$_POST['em_creacion'];
    $cla=$_POST['cla_creacion'];
    $car=$_POST['car_creacion'];
    $car=trim($car);
    $dir=$_POST['dir_creacion'];

    crearUsuario($dni,$nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir);

}

if(isset($_POST['dni_edicion'])){

    $dni=$_POST['dni_edicion'];
    
    $impresion=cargarUsuario($dni);

    $enviarFormato=$impresion['dni']."+".$impresion['nombreUno']."+".$impresion['nombreDos']."+".$impresion['apellidoUno']."+".
    $impresion['apellidoDos']."+".$impresion['email']."+".$impresion['clave']."+".$impresion['cargo']."+".$impresion['direccion']."+".$impresion['foto'];
    echo $enviarFormato;
}

if(isset($_POST['dni_act'])){

    $dni=$_POST['dni_act'];
    $nom=$_POST['nom1_act'];
    $nom2=$_POST['nom2_act'];
    $ape=$_POST['ape1_act'];
    $ape2=$_POST['ape2_act'];
    $em=$_POST['em_act'];
    $cla=$_POST['cla_act'];
    $car=$_POST['car_act'];
    $car=trim($car);
    $dir=$_POST['dir_act'];

    echo actualizarUsuario($dni,$nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir);

}

if(isset($_POST['cod_mat_crear'])){

    $codigo=$_POST['cod_mat_crear'];
    $nombre=$_POST['nom_mat_crear'];
    $docente=$_POST['doc_mat_crear'];
    $docente=trim($docente);

    crearAsignatura($codigo,$nombre,$docente);

}

if(isset($_POST['cod_mat_elim'])){

    $eliminar=$_POST['cod_mat_elim'];

    eliminarAsignatura($eliminar);

}

if(isset($_POST['codigo_edicion'])){

    $codigo=$_POST['codigo_edicion'];
    
    $impresion=cargarMateria($codigo);

    $enviarFormato=$impresion['codigo']."+".$impresion['nombre']."+".$impresion['docente'];
    echo $enviarFormato;
}


if(isset($_POST['cod_mat_act'])){

    $codigo=$_POST['cod_mat_act'];
    $nombre=$_POST['nom_mat_act'];
    $docente=$_POST['doc_mat_act'];
    $docente=trim($docente);

    actualizarAsignatura($codigo,$nombre,$docente);

}

if(isset($_POST['fotoGuardada'])){
    session_start();
    $dni=$_SESSION['user'];
    

    $imagen = $_POST['fotoGuardada'];
    $imagenTratada = base64_decode($imagen);
    actualizaMiFoto($imagenTratada,$dni);
    
}

if(isset($_POST['nom1_act_per'])){
    session_start();
    $dni=$_SESSION['user'];
    $nom=$_POST['nom1_act_per'];
    $nom2=$_POST['nom2_act_per'];
    $ape=$_POST['ape1_act_per'];
    $ape2=$_POST['ape2_act_per'];
    $em=$_POST['em_act_per'];
    $dir=$_POST['dir_act_per'];

    echo actualizacionPersonal($dni,$nom,$nom2,$ape,$ape2,$em,$dir);

}
if(isset($_POST['codigoCapturado'])){
    session_start();
    $_SESSION['laMateria']=$_POST['codigoCapturado'];
}

if(isset($_POST['debgenerado'])){
    session_start();
    $asignatura=$_SESSION['laMateria'];
    $deber=$_POST['debgenerado'];
    $descripcion=$_POST['desgenerado'];
    $rutaArchivo=$_POST['targenerada'];
    $fecha=$_POST['fecgenerada'];
    $rutaArchivo=str_replace(" ", "%20", $rutaArchivo);
    crearDeber($asignatura,$deber,$descripcion,$rutaArchivo,$fecha);
    $id_deber=identificarDeber($asignatura,$deber,$descripcion,$rutaArchivo,$fecha);
    $estudiantes=misAlumnos($asignatura);

    foreach ($estudiantes as $e){
        asignarDeber($e['dni'],$id_deber);
    }
}

if(isset($_POST['identifica_el_deber'])){
    session_start();
    $_SESSION['eldeber']=$_POST['identifica_el_deber'];
}

if(isset($_POST['cambiaNota'])){
    session_start();
    $nuevaNota=$_POST['cambiaNota'];
    $id_deber=$_POST['elEstudiante'];

    modificaNota($nuevaNota,$id_deber);
}

if(isset($_POST['miTareaSubida'])){
    session_start();
    $identificador_tarea=$_SESSION['eldeber'];
    $dni=$_SESSION['user'];
    $mitarea=$_POST['miTareaSubida'];
    $mitarea=str_replace(" ", "%20", $mitarea);
    echo $identificador_tarea;
    subirAlSistemaTarea($identificador_tarea,$mitarea,$dni);

}
?>