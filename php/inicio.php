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
    <script type="text/javascript" src="../js/sideMenu.js"></script>
    <script type="text/javascript" src="../js/sideMenuUsuario.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>Nombre Compañía</title>

    <style>
        body{
            background-image: url('../img/inicio.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }

        #abajo a{
            padding: 20px 50px;
            color: white;
            position:absolute;
            bottom:0;
            left:0;
        }
    </style>
</head>
<body>
    <!-- Side menu -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="http://localhost:8888/ProyectoFinal/php/aboutUs.html">¿Quiénes somos?</a>
        <a href="http://localhost:8888/ProyectoFinal/php/productos.php">Productos</a>
    </div>

    <!-- Opciones usuario -->
    <div id="mySidenav2" class="sidenav2">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
        <h3>Iniciar sesión</h3>
        <form role="form">
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Ingrese su e-mail">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <a href="http://localhost:8888/ProyectoFinal/php/registrarUsuario.php">Registrarse</a>
    </div>

     <!-- Sticky menu -->
     <ul>
        <div class="container">
            <li style="float:left">   <a href="#">  <span class="glyphicon glyphicon-align-justify" style="font-size:15px;cursor:pointer" onclick="openNav()"> </a> </span></li>
            <li style="float:right">  <a href="#">   <span class="glyphicon glyphicon-user" style="font-size:15px;cursor:pointer" onclick="openNav2()">   </a>  </span></li>
            <li style="float:right"> <a href="http://localhost:8888/ProyectoFinal/php/carrito.php"> <span class="glyphicon glyphicon-shopping-cart">  </a></span></li>
            <li style="float:center"><a href="http://localhost:8888/ProyectoFinal/php/inicio.php">Nombre Compañía </a></li>
        </div>
    </ul>

    <!-- Body -->
    <div class="container" id="abajo">
        <a href="http://localhost:8888/ProyectoFinal/php/aboutUs.html">¿Quiénes somos?</a>
    </div>
    
</body>
</html>