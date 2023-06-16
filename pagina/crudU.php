<?php
   if(isset($_SESSION)){
   
     if($_SESSION['user']==""){
         header("location: ../index.html");
     }
   }else{
     session_start();
   
     if($_SESSION['user']==""){
         header("location: ../index.html");
     }
   
   }
   $dni=$_SESSION['user'];
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <title>
         Usuarios
      </title>
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
      <!-- Nucleo Icons -->
      <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
      <!-- CSS Files -->
      <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
      <script src="../javascript/jquery.js"></script>
      <script src="../javascript/usuarios.js"></script>
   </head>
   <body style="background-image:url('fondopages.jpg');background-attachment: fixed;">
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
         <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0"  >
            <img src="../assets/img/favicon.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Usuarios</span>
            </a>
         </div>
         <hr class="horizontal light mt-0 mb-2">
         <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link text-white " href="#">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">book</i>
                     </div>
                     <span class="nav-link-text ms-1">GESTION USUARIOS</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white " href="crudM.php">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">book</i>
                     </div>
                     <span class="nav-link-text ms-1">GESTION ASIGNATURAS</span>
                  </a>
               </li>
               <li class="nav-item mt-3">
                  <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Cuenta</h6>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white " href="miPerfil.php">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hubot</i>
                     </div>
                     <span class="nav-link-text ms-1">MI PERFIL</span>
                  </a>
               </li>
            </ul>
         </div>
         <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
               <a class="btn bg-gradient-primary mt-4 w-100" href="../sesion.php" type="button">Cerrar Sesion</a>
            </div>
         </div>
      </aside>
      <main class="main-content border-radius-lg ">
         <!-- Navbar -->
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
            </div>
         </nav>
         <!-- End Navbar -->
         <div class="container-fluid py-4">
            <button id="botonCrear" type="button" class="btn bg-gradient-primary mt-4 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
            CREAR UN USUARIO
            </button>
            <div class="row">
               <div class="col-12">
                  <div class="card my-4">
                     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-danger shadow-primary border-radius-lg pt-4 pb-3">
                           <h6 class="text-white text-capitalize ps-3">Usuarios</h6>
                        </div>
                     </div>
                     <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                           <table class="table align-items-center mb-0">
                              <thead>
                                 <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">USUARIOS</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rol</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Direccion</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                    <th class="text-secondary opacity-7"></th>
                                    <th class="text-secondary opacity-7"></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    include_once("../lospost/funciones.php");
                                    echo losParticipantes();
                                    ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">CREAR UN USUARIO</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="formUsuarios">
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label" >Cedula</label>
                        <div class="col-sm-10">
                           <input  class="form-control" id="dni" val="" placeholder="Ingrese la cedula">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label" >Nombre</label>
                        <div class="col-sm-10">
                           <input  class="form-control" id="nomOne" val="" placeholder="Ingrese su primer nombre">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label" >Apellido</label>
                        <div class="col-sm-10">
                           <input  class="form-control" id="ApeOne" val="" placeholder="Ingrese su primer apellido">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label" >Email</label>
                        <div class="col-sm-10">
                           <input  class="form-control" id="em" val="" placeholder="Ingrese su email">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label" >Clave</label>
                        <div class="col-sm-10">
                           <input  class="form-control" id="cla" val="" placeholder="Ingrese su clave">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputPassword" class="col-sm-5 col-form-label" >Cargo</label>
                        <div class="col-sm-10">
                           <select class="form-select" aria-label="Default select example" id="comboBox">
                              <option selected>Seleccione cargo</option>
                              <option value="estudiante">administrador</option>
                              <option value="docente">gerente</option>
                              <option value="invitado">miembro</option>
                           </select>
                        </div>
                     </div>
                     <div class="modal-footer">
                        
                        <button type="submit" class="btn bg-gradient-primary mt-4 w-100" id="crear" hidden="true">Crear</button>
                        <button type="button" class="btn bg-gradient-primary mt-4 w-100" id="actualizar" hidden="true">Actualizar</button>
                        <button type="button" class="btn bg-gradient-primary mt-4 w-100" data-bs-dismiss="modal">Cerrar</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </main>


      <!--   Core JS Files   -->
      <script src="../assets/js/core/popper.min.js" ></script>
      <script src="../assets/js/core/bootstrap.min.js" ></script>
      <script src="../assets/js/plugins/perfect-scrollbar.min.js" ></script>
      <script src="../assets/js/plugins/smooth-scrollbar.min.js" ></script>