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

function matriculas($cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura where codigo not in (SELECT materia from matriculados where cedula =?)");
    $consulta->execute(array($cedula));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function misMaterias($cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura where codigo in (SELECT materia from matriculados where cedula =?)");
    $consulta->execute(array($cedula));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function matricularme($codigoMateria,$cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("INSERT INTO matriculados values(0,?,?)");
    $consulta->execute(array($cedula,$codigoMateria));
}

function consultaCursos($cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura where docente=?");
    $consulta->execute(array($cedula));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function lospersonal(){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM personal");
    $consulta->execute();
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function eliminarUsuario($eliminar){

    $conexion=conectar();
try {
    $consulta=$conexion->prepare("DELETE FROM tareasestudiantes where estudiante=? ");
      echo $consulta->execute(array($eliminar));
} catch (\Throwable $th) {
    echo "no hay";
}

try {
    $consulta=$conexion->prepare("DELETE FROM matriculados where cedula=? ");
        echo $consulta->execute(array($eliminar));
} catch (\Throwable $th) {
    echo "no hay";
}

  try {
    $consulta=$conexion->prepare("UPDATE asignatura set docente=null where docente=? ");
        echo $consulta->execute(array($eliminar));
  } catch (\Throwable $th) {
    echo "no hay";
  }      
    $consulta=$conexion->prepare("DELETE FROM personal where cedula=? ");
    echo $consulta->execute(array($eliminar));
}


function crearUsuario($cedula,$nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir){
    $conexion=conectar();
    $consulta=$conexion->prepare("INSERT INTO personal values (?,?,?,?,?,?,?,?,?,null)");
    $consulta->execute(array($cedula,$nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir));

}

function cargarUsuario($cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM personal where cedula=?");
    $consulta->execute(array($cedula));
    $resultado=$consulta->fetch();
    return $resultado;
}

function actualizarUsuario($cedula,$nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir){
    $conexion=conectar();
    $consulta=$conexion->prepare("UPDATE personal SET nombreUno=?,nombreDos=?,apellidoUno=?,apellidoDos=?,
                                email=?,clave=?,rol=?,direccion=? where cedula=?");
    $consulta->execute(array($nom,$nom2,$ape,$ape2,$em,$cla,$car,$dir,$cedula));

}

function lasMaterias(){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura");
    $consulta->execute();
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function losDocentes(){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM personal where rol='docente' ");
    $consulta->execute();
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function crearAsignatura($codigo,$nombre,$docente){
    try {
        $conexion=conectar();
        $consulta=$conexion->prepare("INSERT INTO asignatura VALUES (?,?,?)");
        $consulta->execute(array($codigo,$nombre,$docente));
    } catch (\Throwable $th) {
        $conexion=conectar();
        $consulta=$conexion->prepare("INSERT INTO asignatura VALUES (?,?,null)");
        $consulta->execute(array($codigo,$nombre));
    }
    
}

function eliminarAsignatura($eliminar){
    $conexion=conectar();
try {
    $consulta=$conexion->prepare("DELETE FROM tareasestudiantes where asignacionPer in 
                                (SELECT id FROM asignaciones where cod_mat=?)");
    $consulta->execute(array($eliminar));
} catch (\Throwable $th) {
}
    
try {
    $consulta=$conexion->prepare("DELETE FROM asignaciones where cod_mat=?");
    echo $consulta->execute(array($eliminar));
} catch (\Throwable $th) {
}
    
try {
    $consulta=$conexion->prepare("DELETE FROM matriculados where materia=?");
    echo $consulta->execute(array($eliminar));
} catch (\Throwable $th) {
    //throw $th;
}
    $consulta=$conexion->prepare("UPDATE asignatura SET docente=null WHERE codigo=?");
    $consulta->execute(array($eliminar));
    
    $consulta=$conexion->prepare("DELETE FROM asignatura WHERE codigo=?");
    $consulta->execute(array($eliminar));
}

function cargarMateria($codigo){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura where codigo=?");
    $consulta->execute(array($codigo));
    $resultado=$consulta->fetch();
    return $resultado;
}

function actualizarAsignatura($codigo,$nombre,$docente){
    try {
        $conexion=conectar();
        $consulta=$conexion->prepare("UPDATE asignatura SET nombre=?, docente=? where codigo=?");
        $consulta->execute(array($nombre,$docente,$codigo));
    } catch (\Throwable $th) {
        $conexion=conectar();
        $consulta=$conexion->prepare("UPDATE asignatura SET nombre=?, docente=null where codigo=?");
        $consulta->execute(array($nombre,$codigo));
    }


}

function actualizaMiFoto($imagenTratada,$cedula){

    $conexion=conectar();
    $consulta=$conexion->prepare("UPDATE personal SET foto=? where cedula=?");
    $consulta->execute(array($imagenTratada,$cedula));

}

function actualizacionPersonal($cedula,$nom,$nom2,$ape,$ape2,$em,$dir){
    $conexion=conectar();
    $consulta=$conexion->prepare("UPDATE personal SET nombreUno=?,nombreDos=?,apellidoUno=?,apellidoDos=?,
                                email=?,direccion=? where cedula=?");
    echo $consulta->execute(array($nom,$nom2,$ape,$ape2,$em,$dir,$cedula));
}

function informacionMateria($asignatura){

    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignatura where codigo=?");
    $consulta->execute(array($asignatura));
    $resultado=$consulta->fetch();
    return $resultado;
}
function losDeberes($asignatura){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignaciones where cod_mat = ?");
    $consulta->execute(array($asignatura));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function misAlumnos($asignatura){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM personal where cedula in (SELECT cedula from matriculados where materia=?)");
    $consulta->execute(array($asignatura));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function crearDeber($asignatura,$deber,$descripcion,$rutaArchivo,$fecha){

    $conexion=conectar();
    $consulta=$conexion->prepare("INSERT INTO asignaciones VALUES (0,?,?,?,?,?)");
    $consulta->execute(array($deber,$descripcion,$fecha,$rutaArchivo,$asignatura));
}

function identificarDeber($asignatura,$deber,$descripcion,$rutaArchivo,$fecha){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT id from asignaciones where cod_mat=? and asignacion=? and descripcion=? and entrega=? and recurso=?");
    $consulta->execute(array($asignatura,$deber,$descripcion,$fecha,$rutaArchivo));
    $resultado=$consulta->fetch();
    return $resultado['id'];

}
function asignarDeber($est,$id_deber){
    $conexion=conectar();
    $consulta=$conexion->prepare("INSERT INTO tareasestudiantes VALUES (0,?,?,null,0)");
    $consulta->execute(array($est,$id_deber));
}

function consultaTarea($tarea){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignaciones where id=?");
    $consulta->execute(array($tarea));
    $resultado=$consulta->fetch();
    return $resultado;
}
function tareasDeEstudiantes($numTarea){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM tareasestudiantes where asignacionPer=?");
    $consulta->execute(array($numTarea));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function modificaNota($nuevaNota,$id_deber){
    $conexion=conectar();
    $consulta=$conexion->prepare("UPDATE tareasestudiantes set nota=? where id=?");
    $consulta->execute(array($nuevaNota,$id_deber));
}

function consultasMisTareas($asignatura,$yo){

    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM asignaciones where cod_mat = ? and id in (SELECT
                        asignacionPer from tareasestudiantes where estudiante=?)");
    $consulta->execute(array($asignatura,$yo));
    $resultado=$consulta->fetchAll();
    return $resultado;
}

function subirAlSistemaTarea($identificador_tarea,$mitarea,$cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("UPDATE tareasestudiantes set miDeber=? where estudiante=? and asignacionPer=?");
    echo $consulta->execute(array($mitarea,$cedula,$identificador_tarea));
    

}

function EsMiTarea($numTarea,$cedula){
    $conexion=conectar();
    $consulta=$conexion->prepare("SELECT * FROM tareasestudiantes where asignacionPer=? and estudiante=?");
    $consulta->execute(array($numTarea,$cedula));
    $resultado=$consulta->fetchAll();
    return $resultado;
}


?>