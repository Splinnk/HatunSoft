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
      <link rel="icon" type="image/png" href="../assets/img/libro.png">
      <title>
         ADMINISTRADOR
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
   </head>
   <body style="background-image:url('fondopages.jpg');background-attachment: fixed;">
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
         <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0"  target="_blank">
            <img src="../assets/img/libro.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">ADMINISTRADOR</span>
            </a>
         </div>
         <hr class="horizontal light mt-0 mb-2">
         <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link text-white " href="crudU.php">
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
               <a class="btn bg-gradient-primary mt-6 w-100" href="../sesion.php" type="button">Cerrar Sesion</a>
            </div>
         </div>
      </aside>
      
      <main class="main-content border-radius-lg ">
         <!-- Navbar -->
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         </nav>
         <!-- End Navbar -->
         <div class="container">
         <img src="https://fisei.uta.edu.ec/v4.0/images/mv-sistemas.png" class="img-fluid">
         
         
         
         </div>
         
         <br>
         <div class="container">
         <img src="https://fca.uta.edu.ec/v4.0/images/mv-contabilidad.png" class="img-fluid">
         
         
         
         </div>
         <br>
         <div class="container">
         <img src="https://fcial.uta.edu.ec/v4.0/images/historia_facultad/mision-vision-alimentos.png" class="img-fluid">
         
         
         
         </div>
         
         
      </main>
   </body>
   <!--   Core JS Files   -->
   <script src="../assets/js/core/popper.min.js" ></script>
   <script src="../assets/js/core/bootstrap.min.js" ></script>
   <script src="../assets/js/plugins/perfect-scrollbar.min.js" ></script>
   <script src="../assets/js/plugins/smooth-scrollbar.min.js" ></script>