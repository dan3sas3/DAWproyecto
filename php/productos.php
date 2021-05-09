<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="../css/productos.css">

    <link rel="stylesheet" type="text/css" href="../css/stickyMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenuUsuario.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/sideMenu.js"></script>
    <script type="text/javascript" src="../js/sideMenuUsuario.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
    ></script>

    <script>
        function myFunction() {
            document.getElementById("GFG").submit();
        }
    </script>

</head>
<body>
  <header>
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
           <li style="float:left">   <a href="#"> <span class="glyphicon glyphicon-align-justify" style="font-size:15px;cursor:pointer" onclick="openNav()"> </a> </span></li>
           <li style="float:right">  <a href="#"> <span class="glyphicon glyphicon-user" style="font-size:15px;cursor:pointer" onclick="openNav2()">   </a>  </span></li>
           <li style="float:right"> <a href="http://localhost:8888/ProyectoFinal/php/carrito.php"> <span class="glyphicon glyphicon-shopping-cart">  </a></span></li>
           <li style="float:center"><a href="http://localhost:8888/ProyectoFinal/php/inicio.php">Nombre Compañía </a></li>
       </div>
   </ul> 
  </header>

    <!-- Filtro -->
    <div class="header">
        <h1>Productos</h1><br>
    </div>
    <div class="d-flex justify-content-center btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="option1" autocomplete="off" onclick=""checked> Todos
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="option2" autocomplete="off"> Lentes de Sol
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="option3" autocomplete="off"> Lentes
        </label>
    </div><br><br><br>


<!-- Productos -->
<?php
    // Crear una conexión
    $con = mysqli_connect("localhost:8889","root","root","DAW");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT ID_Producto, Nombre, Fotos, Precio FROM Productos";
    $res = mysqli_query($con,  $sql);
    $contador = 0;
    $idP = "";

            echo "<center><div class='container'><div class='containerB'>";
                echo "<div class='categories'>";
                    echo "<div class='small-container'>";
                        echo "<div class='row'>";
    if (mysqli_num_rows($res) > 0) {
        while ($rows = mysqli_fetch_assoc($res)) { 
                if($contador == 3){
                    echo "<div class='small-container'>";
                        echo "<div class='row'>";}
                            echo "<div class='col-4'>";
                                $idP = $rows['ID_Producto'];
                                echo "<form id='GFG' method='post' enctype='multipart/form-data' action='producto.php'>";
                                    
                                    echo "<input type='hidden' name='identificador' value='$idP'>";
                                    echo "<div class='cuadro bg-image hover-zoom fliterDiv sun'>";
                                        echo "<h4>" .$rows['Nombre']. "</h4>";
                                        ?><img src="../img/<?=$rows['Fotos']?>"><?php
                                        echo "<br>";
                                        echo "<p>$" .$rows['Precio']. " USD</p>";
                                        echo "<input type='submit' value='Ver más'>";
                                    echo "</div>";
                                echo "</form>";

                            echo "</div>";
                    if($contador == 3){
                        echo "</div>";
                    echo "</div>";
                        $contador = 0;
                    }
                    $contador++;
        }
    }
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div></div></center>";
?>
</body>
</html>
