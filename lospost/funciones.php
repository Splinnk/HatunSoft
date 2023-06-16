

<?php
    include_once("../base/consultas.php");

    function mostrarMatriculas($dni){
        $lista=matriculas($dni);
        $imprimir="";
        foreach ($lista as $l){

           $imprimir.= "<div class='col-lg-4 mb-lg-0 mb-4'>
                            <a><div class='card  mt-4'>
                                <div class='card-body mt-n5 px-3' align='center'>
                                    <div class='bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3'>
                                        <div class='chart'>
                                            <canvas id='chart-bars' class='chart-canvas' height='150'></canvas>
                                        </div>
                                    </div>
                                    <h4 class='ms-2 mt-4 mb-0'>".$l['nombre']."  </h4>
                                </div>
                            </div></a>
                            </div><br>";

        }
        return $imprimir;
    }

    function mostrarMateriasNoMatriculado($dni){
        $lista=matriculas($dni);
        $imprimir="";
        foreach ($lista as $l){

           $imprimir.= "<div class='col-lg-4 mb-lg-0 mb-4' align='center'>
                            <div class='card  mt-4'>
                                <div class='card-body mt-n5 px-3' align='center'>
                                    <div class='bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3'>
                                        <div class='chart'>
                                            <canvas id='chart-bars' class='chart-canvas' height='150'></canvas>
                                        </div>
                                    </div>
                                    <h4 class='ms-2 mt-4 mb-0'>".$l['nombre']."  </h4>
                                </div>
                            </div><button type='button' class='btn bg-gradient-primary matricularme' id=".$l['codigo'].">Matricularme</button>
                            </div>";

        }
        return $imprimir;
    }

    function misMatriculas($dni){
        $lista=misMaterias($dni);
        $imprimir="";
        foreach ($lista as $l){

           $imprimir.= "<div class='col-lg-4 mb-lg-0 mb-4'>
                            <a class='materias'  href='#' id=".$l['codigo']."><div class='card  mt-4'>
                                <div class='card-body mt-n5 px-3' align='center'>
                                    <div class='bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3'>
                                        <div class='chart'>
                                            <canvas id='chart-bars' class='chart-canvas' height='150'></canvas>
                                        </div>
                                    </div>
                                    <h4 class='ms-2 mt-4 mb-0'>".$l['nombre']."  </h4>
                                </div>
                            </div></a>
                            </div><br>";

        }
        return $imprimir;
    }

    function misCursos($dni){
        $lista=consultaCursos($dni);
        $imprimir="";
        foreach ($lista as $l){

           $imprimir.= "<div class='col-lg-4 mb-lg-0 mb-4'>
                            <a class='asignaturas' href='#' id=".$l['codigo']."><div class='card  mt-4'>
                                <div class='card-body mt-n5 px-3' align='center'>
                                    <div class='bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3'>
                                        <div class='chart'>
                                            <canvas id='chart-bars' class='chart-canvas' height='150'></canvas>
                                        </div>
                                    </div>
                                    <h4 class='ms-2 mt-4 mb-0'>".$l['nombre']."  </h4>
                                </div>
                            </div></a>
                            </div><br>";

        }
        return $imprimir;
    }


    function losParticipantes(){
        $lista=lospersonal();
        $imprimir="";

        foreach ($lista as $l){
            $imprimir.="<tr>
            <td>
              <div class='d-flex px-2 py-1'>
                <div>";
                if($l['foto']!=null && $l['foto']!=""){
                 $imprimir.=  "<img src='data:image/jpg;base64,".base64_encode($l['foto'])."' class='avatar avatar-sm me-3 border-radius-lg'>";
                }else{
                $imprimir.= "<img src='../noUsuario.png' class='avatar avatar-sm me-3 border-radius-lg' alt='user1'>";
                }
                $imprimir.="</div>
                <div class='d-flex flex-column justify-content-center'>
                  <h6 class='mb-0 text-sm'>".$l['nombre']." ".$l['apellido']." </h6>
                  <p class='text-xs text-secondary mb-0'>".$l['email']."</p>
                </div>
              </div>
            </td>
            <td>
              <p align='center' class='text-xs font-weight-bold mb-0'>".$l['clave']."</p>
            </td>
            <td class='align-middle text-center text-sm'>
                <p class='text-xs font-weight-bold mb-0'>".$l['rol']."</p>
            </td>
            <td class='align-middle'>
              <a href='#' id='".$l['cedula']."' class='text-secondary font-weight-bold text-xs editar' data-toggle='tooltip' data-original-title='Edit user' >
                Editar
              </a>
            </td>
            <td>
            <a href='#' id='".$l['cedula']."' class='text-secondary font-weight-bold text-xs eliminar' data-toggle='tooltip' data-original-title='Edit user' >
            Eliminar
          </a>
            </td>
          </tr>";
        }
        return $imprimir;
    }




    function lasAsignaturas(){
        $lista=lasMaterias();
        $imprimir="";

        foreach ($lista as $l){
            $imprimir.="<tr>
            <td>
              <p align='center' class='text-xs font-weight-bold mb-0'>".$l['codigo']."</p>
            </td>
            <td class='align-middle text-center text-sm'>
                <p class='text-xs font-weight-bold mb-0'>".$l['nombre']."</p>
            </td>
            <td class='align-middle text-center'>
              <span class='text-secondary text-xs font-weight-bold'>".$l['docente']."</span>
            </td>
            <td class='align-middle'>
              <a href='#' id='".$l['codigo']."' class='text-secondary font-weight-bold text-xs editar' data-toggle='tooltip' data-original-title='Edit user' >
                Editar
              </a>
            </td>
            <td>
            <a href='#' id='".$l['codigo']."' class='text-secondary font-weight-bold text-xs eliminar' data-toggle='tooltip' data-original-title='Edit user' >
            Eliminar
          </a>
            </td>
          </tr>";
        }
        return $imprimir;
    }
    
    
       function lasAsignaturas1(){
       $lista=lasMaterias();
       $imprimir="";
   
       foreach ($lista as $l){
           $imprimir.="<tr>
           <td>
             <p align='center' class='text-xs font-weight-bold mb-0'>".$l['codigo']."</p>
           </td>
           <td class='align-middle text-center text-sm'>
               <p class='text-xs font-weight-bold mb-0'>".$l['nombre']."</p>
           </td>
           <td class='align-middle text-center'>
             <span class='text-secondary text-xs font-weight-bold'>".$l['docente']."</span>
           </td>

         </tr>";
       }
       return $imprimir;
   }

    function generarDocentes(){
        $lista=losDocentes();
        $imprimir="";

        foreach ($lista as $l){
            $imprimir.="<option value=".$l['dni'].">".$l['dni']."</option>";
        }
        return $imprimir;
    }
    function definirAsignatura($asignatura){
      $nombreMateria=informacionMateria($asignatura);
      echo "<h4>".$nombreMateria['nombre']."</h4>";
    }
    function mostrarDeberes($asignatura){
      $deberes=losDeberes($asignatura);
      $imprimir="";
      $iterador=0;
      foreach ($deberes as $d){
        $imprimir.="<a href='#' class='list-group-item list-group-item-action lastareas' id=".$deberes[$iterador]['id'].">".$deberes[$iterador]['asignacion']."</a>";
        $iterador++;
      }
      echo $imprimir;
    }


    function losAlumnos($asignatura){
      $lista=misAlumnos($asignatura);
      $imprimir="";

      foreach ($lista as $l){
          $imprimir.="<tr>
          <td>
            <div class='d-flex px-2 py-1'>
              <div>";
              if($l['foto']!=null && $l['foto']!=""){
               $imprimir.=  "<img src='data:image/jpg;base64,".base64_encode($l['foto'])."' class='avatar avatar-sm me-3 border-radius-lg'>";
              }else{
              $imprimir.= "<img src='../noUsuario.png' class='avatar avatar-sm me-3 border-radius-lg' alt='user1'>";
              }
              $imprimir.="</div>
              <div class='d-flex flex-column justify-content-center'>
                <h6 class='mb-0 text-sm'>".$l['nombreUno']." ".$l['nombreDos']." ".$l['apellidoUno']." ".$l['apellidoDos']."</h6>
                <p class='text-xs text-secondary mb-0'>".$l['email']."</p>
              </div>
            </div>
          </td>

          <td class='align-middle text-center text-sm'>
              <p class='text-xs font-weight-bold mb-0'>".$l['dni']."</p>
          </td>
          <td class='align-middle text-center'>
            <span class='text-secondary text-xs font-weight-bold'>".$l['direccion']."</span>
          </td>
          
        </tr>";
      }
      return $imprimir;
  }

  function informacionTarea($tarea){

    $latarea=consultaTarea($tarea);

    echo $imprimir="<h5>".$latarea['asignacion']."</h5>";
    echo $imprimir="<span class='text font-weight-bold'>".$latarea['descripcion']."</span>";
    echo "<br>";
    echo $imprimir="<a href='../espacioPDFS/".$latarea['recurso']."' target='_blank'><button type='button' class='btn bg-gradient-primary mt-4 w-100'>Ver PDF</button></a>";

  }


  function lasCalificaciones($numTarea){
    $lista=tareasDeEstudiantes($numTarea);
    $imprimir="";

    foreach ($lista as $l){
        $imprimir.="<tr>
        <td class='align-middle text-center text-sm'>
        <h6 class='mb-0 text-sm'>".$l['estudiante']."</h6>
        </td>
        <td class='align-middle text-center text-sm'>
            <a href='../espacioPDFS/".$l['miDeber']."' target='_blank'><p class='text-xs font-weight-bold mb-0'>".$l['miDeber']."</p>
        </td>
        <td class='align-middle text-center'>
          

        <div class='mb-0 text-sm' >
        <input type='text' style='text-align:center' class='form-control'  id='s".$l['id']."' value=".$l['nota']. ">
      </div>


        </td>
        <td>
        <button type='button' class='btn bg-gradient-primary actualizaNotas' id=".$l['id'].">Calificar</button>
        </td>

      </tr>";
    }
    return $imprimir;
}


function mostrarMisTareasParaHacer($asignatura){
  $yo=$_SESSION['user'];
  $deberes=consultasMisTareas($asignatura,$yo);
  $imprimir="";
  $iterador=0;
  foreach ($deberes as $d){
    $imprimir.="<a href='#' class='list-group-item list-group-item-action lastareas' id=".$deberes[$iterador]['id'].">".$deberes[$iterador]['asignacion']."</a>";
    $iterador++;
  }
  echo $imprimir;
}

function miCalificacion($numTarea,$dni){
  $lista=EsMiTarea($numTarea,$dni);
  $imprimir="";

  foreach ($lista as $l){
      $imprimir.="<tr>
      
      <td class='align-middle text-center text-sm'>
          <a href='../espacioPDFS/".$l['miDeber']."' target='_blank'><p class='text-xs font-weight-bold mb-0'>".$l['miDeber']."</p>
      </td>
      <td class='align-middle text-center'>
        

      <div class='mb-0 text-sm' >
      <input type='text' style='text-align:center' class='form-control'  id='s".$l['id']."' value=".$l['nota']. ">
    </div>




    </tr>";
  }
  return $imprimir;
}
?>