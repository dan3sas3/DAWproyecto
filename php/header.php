<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/stickyMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenuUsuario.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../js/sideMenu.js"></script>
    <script type="text/javascript" src="../js/sideMenuUsuario.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
      <!-- Side menu -->
      <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="http://localhost/PHPProjects/DAWproyecto-main/php/aboutUs.php">¿Quiénes somos?</a>
          <a href="http://localhost/PHPProjects/DAWproyecto-main/php/productos.php">Productos</a>
      </div>


      <!-- Opciones usuario -->
      <div id="mySidenav2" class="sidenav2">
          <?php
            if(!isset($_SESSION['nombre'])){
              echo '<form role="form" action="includes/login.inc.php" method="post">
                  <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su e-mail">
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" name="passwd" id="password" placeholder="Ingrese su contraseña">
                  </div>
                  <button type="submit" class="btn btn-default" name="login-submit">Login</button>
                  <a href="http://localhost/PHPProjects/DAWproyecto-main/php/registrarUsuario.php">Registrarse</a>
              </form>';
            }else{
              echo '<form role="form" action="includes/logout.inc.php" method="post">
                  <button type="submit" class="btn btn-default" name="logout-submit">Logout</button>
              </form>';
            }
          ?>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
      </div>
      <!-- Sticky menu -->
      <ul>
         <div class="container">
             <li style="float:left">   <a href="#">  <span class="glyphicon glyphicon-align-justify" style="font-size:15px;cursor:pointer" onclick="openNav()"> </a> </span></li>
             <li style="float:right">  <a href="#">   <span class="glyphicon glyphicon-user" style="font-size:15px;cursor:pointer" onclick="openNav2()">   </a>  </span></li>
             <li style="float:right"> <a href="http://localhost/PHPProjects/DAWproyecto-main/php/carrito.php"> <span class="glyphicon glyphicon-shopping-cart">  </a></span></li>
             <li style="float:center"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/inicio.php">Nombre Compañía </a></li>
         </div>
     </ul>
  </header>
