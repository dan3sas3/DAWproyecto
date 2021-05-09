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
    
    <style>
        .error {color: #FF0000;}
    </style>
    
    <title>Registrar</title>
   
</head>
<body>
    <?php
        // define variables and set to empty values
        $NombreUsuario = $email = $contraseña = $fecha = $tarjeta = $direccion = $verificar = "";
        $NombreUsuarioErr = $emailErr = $contraseñaErr = $fechaErr = $tarjetaErr = $direccionErr = $verificarErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
                $NombreUsuarioErr = "Nombre completo necesario";
            } else {
                $NombreUsuario = test_input($_POST["nombre"]);
            }

            if(empty($_POST["fecha"])){
                $fechaErr = "Fecha de nacimiento requerida";
            }else{
                $fecha = test_input($_POST["fecha"]);
            }

            if (empty($_POST["tarjeta"])) {
                $tarjetaErr = "Número de tarjeta necesario";
            } else {
                $tarjeta = test_input($_POST["tarjeta"]);
            }

            if (empty($_POST["direccion"])) {
                $direccionErr = "Dirección postal necesaria";
            } else {
                $direccion = test_input($_POST["direccion"]);
            }

            if(empty($_POST["contraseña"])){
                $contraseñaErr = "Contraseña necesaria";
            }else{
                $contraseña = test_input($_POST["contraseña"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email necesario";
            } else {
                $email = test_input($_POST["email"]);
                // verificar si la direccion de correo es valida
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
                $emailErr = "Formato de dirección inválido";
                }
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

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
    <div class="container">
        <h2>Registrar</h2>
        <h6>Por favor, introduzca la información requerida</h6>
        <h7><span class="error">* campo requerido.</span></h7>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre completo:
        <div class="form-group">
            <input type="text" class="form-control" name="nombre" value="<?php echo $NombreUsuario;?>">
            <span class="error">* <?php echo $NombreUsuarioErr;?></span>
        </div>
        Fecha de nacimiento:
        <div class="form-group">
            <input type="date" class="form-control" name="fecha" value="<?php echo $fecha;?>">
            <span class="error">* <?php echo $fechaErr;?></span>
        </div>
        E-mail:
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
        </div>
        Número de tarjeta bancaria:
        <div class="form-group">
            <input type="number" step="1.0" min="0" max="9999999999999999"class="form-control" name="tarjeta" value="<?php echo $tarjeta;?>">
            <span class="error">* <?php echo $tarjetaErr;?></span>
        </div>
        Dirección postal:
        <div class="form-group">
            <input type="text" class="form-control" name="direccion" value="<?php echo $direccion;?>">
            <span class="error">* <?php echo $direccionErr;?></span>
        </div>
        Contraseña:
        <div class="form-group">
            <input type="password" class="form-control" name="contraseña">
            <span class="error">* <?php echo $contraseñaErr;?></span>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>


    <?php
        if(isset($_POST['submit']) 
        && !empty($_POST["nombre"]) && isset($_POST["fecha"]) && !empty($_POST["email"]) && !empty($_POST["tarjeta"]) && !empty($_POST["direccion"]) && !empty($_POST["contraseña"])
        ){
            
            //////////////////////////////////////////////////////////////////////////////////
            // Crear una conexión


            $con = mysqli_connect("localhost:8889","root","root","DAW");

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }else{
                echo "Connected to MySQL: ";
            }

            // escape variables for security
            $NombreUsuario = mysqli_real_escape_string($con, $_POST['nombre']);
            $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $tarjeta = mysqli_real_escape_string($con, $_POST['tarjeta']);
            $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
            $contraseña = mysqli_real_escape_string($con, $_POST['contraseña']);

            // //Insertar a DB
            $sql = "INSERT INTO Usuario (Nombre_del_usuario, Correo_electronico, Contraseña, Fecha_de_Nacimiento, Numero_de_tarjeta_bancaria, Direccion_Postal) VALUES  ('$NombreUsuario', '$email', '$contraseña', '$fecha' , '$tarjeta', '$direccion');";

            if (!mysqli_query($con,$sql)) {
                die('<br>Error: ' . mysqli_error($con));
            }
            
            echo "<br>1 record added";
            mysqli_close($con);


            header("Location: inicio.php");
            /////////////////////////////////////////////////////////
            
        }
    ?>
</body>
</html>