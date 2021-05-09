<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="../css/stickyMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/sideMenuUsuario.css">
    <script type="text/javascript" src="../js/sideMenu.js"></script>
    <script type="text/javascript" src="../js/sideMenuUsuario.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <style>
        .container-fluid{
            color: white;
        }
    </style>


    <title>Producto</title>
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
    <br><br>
    <?php
        // Crear una conexión
        $con = mysqli_connect("localhost:8889","root","root","DAW");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $idP = $_POST['identificador'];
        $sql = "SELECT * FROM Productos WHERE ID_Producto=$idP";
        $res = mysqli_query($con,  $sql);


        if (mysqli_num_rows($res) > 0) {
            while ($rows = mysqli_fetch_assoc($res)) { 
                echo "<div class='container'>";
                    echo "<div class='row'>";
                        echo "<div class='col'>";
                            echo "<h1>" .$rows['Tipo']."</h1>";
                            echo "<div class='image_selected'>";
                                ?><img src="../img/<?=$rows['Fotos']?>"><?php
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col'> <br><br><br><br><br><br>";
                            echo "<div class='well'>";
                                echo "<div class='product_name'><h2>" .$rows['Nombre']. "</h2></div>";
                                echo "<div> <span class='product_price'><h2> $" .$rows['Precio']. " USD</h2></span> </div>";
                                echo "<hr class='singleline'>";
                                echo "<div> <span class='product_info'><h4>" .$rows['Descripcion']. "</h4><span><br></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div> <br><br><br><br><br>";


                echo "<div class='container-fluid' style=' background-color: #333; padding: 11px;'>";
                    echo "<div class='row'>";
                        echo "<div class='col'>";
                            echo "<h2>Fabricante:</h2>";
                            echo "<h3>" .$rows['Fabricante']. "</h3>";     
                        echo "</div>";
                        echo "<div class='col'>";
                            echo "<h2>Lugar de Origen:</h2>";
                            echo "<h3>" .$rows['Origen']. "</h3>";
                        echo "</div>";
                        echo "<div class='col'>";
                            echo "<br><h2>$" .$rows['Precio']." USD</h2>";      
                        echo "</div>";
                        echo "<div class='col'>";
                            echo "<button type='button' class='btn btn-success btn-block'><h2>Añadir al carrito</h2></button><br>";    
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }?>
    

    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <h1>Sunglasses</h1>
                <div class="image_selected">
                    <img src="https://i.imgur.com/qEwct2O.jpg" alt="">
                </div>
            </div>
            <div class="col">
                <br><br><br><br><br><br>
                <div class="well">
                    <div class="product_name"><h2>Acer Aspire 3 Celeron Dual Core - (2 GB/500 GB HDD/Windows 10 Home) A315-33 Laptop (15.6 inch, Black, 2.1 kg)</h2></div>
                    <div> <span class="product_price"><h2>₹ 29,000</h2></span> </div>
                    <hr class="singleline">
                    <div> <span class="product_info"><h4>EMI starts at ₹ 2,000. No Cost EMI Available</h4><span><br></div>
                </div>
            </div>
        </div>  
    </div>

    <br><br><br><br><br>
    <div class="container-fluid" style=" background-color: #333; padding: 11px;">
            <div class="row">
                <div class="col">
                    <h2>Fabricante:</h2>
                    <br>RayB
                </div>
                <div class="col">
                    <h2>Lugar de Origen:</h2>
                    <br>China
                </div>
                <div class="col">
                    <h2>$457</h2>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success btn-block"><h2>Añadir al carrito</h2></button>
                    <br>
                </div>
            </div>
    </div> -->
</body>
</html>