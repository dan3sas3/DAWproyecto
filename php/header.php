<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        *{
          font-family: 'Poppins', sans-serif;
        }
        .login {
          height: 200px;
          position: relative;
          border: 3px solid blue;
        }
        .center {
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }
    </style>
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
              echo "<div class='login'>";
              echo "<div class='center'>";
              echo  '<a style="font-size:15px;" href="http://localhost/PHPProjects/DAWproyecto-main/php/usuario.php">'.$_SESSION['mail'].'</a>';
              echo '<form role="form" action="includes/logout.inc.php" method="post">
              <center><button type="submit" class="btn btn-default" name="logout-submit">Logout</button></center>
              </form>';
              echo "</div>";
              echo "</div>";
            }
          ?>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
      </div>
      <!-- Sticky menu -->
      <ul>
         <div class="container">
             <li style="float:left">   <a href="#">  <span class="glyphicon glyphicon-align-justify" style="font-size:15px;cursor:pointer" onclick="openNav()"> </a> </span></li>
             <li style="float:right">  <a href="#">   <span class="glyphicon glyphicon-user" style="font-size:15px;cursor:pointer" onclick="openNav2()">   </a>  </span></li>
              <li style="float:right">
                 <?php
                      if(isset($_SESSION['mail'])){
                        echo "<a href='http://localhost/PHPProjects/DAWproyecto-main/php/carrito.php'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'>  </a></span>";
                      }else{
                        echo "<a href='javascript:;' onclick='openNav2()'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'>  </a></span>";
                      }
                  ?>
            </li>

             <li style="float:center"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/inicio.php">K&D Peoples</a></li>
         </div>
     </ul>
  </header>
