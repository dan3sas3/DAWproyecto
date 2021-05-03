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
    <script type="text/javascript" src="../js/carrito.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <title>Carrito de compras</title>
   
</head>
<body>
    <!-- Side menu -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="http://localhost:8888/ProyectoFinal/php/aboutUs.html">¿Quiénes somos?</a>
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
            <li style="float:center"><a href="http://localhost:8888/ProyectoFinal/php/inicio.html">Nombre Compañía </a></li>
        </div>
    </ul>

    <!-- Body -->
    <div class="container">
        <h2>Lista del carrito</h2>
        <p>Estos son los artículos que llevas en tu carrito de compras. Puedes modificarlo si gustas</p>
        <table class="table">
        <thead>
            <tr>
            <th>Artículo</th>
            <th>Descripción del producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Lentes Ray Ban</td>
            <td>Lentes de sol</td>
            <td>$450.00</td>
            <td>
                <input type="number" value="0" min="0" id="cantidad"/>
            </td>
            <td>$450.00</td>
            </tr>
        </tbody>
        </table>

        <a href="#"><span class="glyphicon glyphicon-remove" style="font-size:15px;cursor:pointer"></a></span>

        <br><br><br>        
        <div class="well well-sm">
            <h3>Resumen de la compra</h2>
            <h4>Subtotal de la compra </h3> $450
            <h5>Impuestos</h4> $32
            <h4>Total a pagar </h3> $482
        </div>

        <br><br>
        <button type="button" class="btn btn-success">Ir a pagar</button>

    </div>


    
</body>
</html>