<?php
  require "header.php";
 ?>
 <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style>
        .container-fluid{
            color: white;
        }
        img {
            width: 100%;
            height: 360px;
        }
        .well{
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

    </style>
    <title>Producto</title>
</head>
  <main>
    <!-- Body -->
    <br><br>
    <?php
        // Crear una conexión
        include 'conexion.php';
        $con = OpenCon();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if(empty($_POST['identificador'])){
          header("Location: inicio.php");
        }else{
          $idP = $_POST['identificador'];
          $sql = "SELECT * FROM Productos WHERE ID_Producto=$idP";
          $res = mysqli_query($con,  $sql);
          if (mysqli_num_rows($res) > 0) {
              while ($rows = mysqli_fetch_assoc($res)) {
                  echo "<div class='container'>";
                      echo "<div class='row'>";
                          echo "<div class='col'>";
                              echo "<h1>" .$rows['Tipo']."</h1>";
                              echo "<br><br>";
                              echo "<div class='image_selected'>";
                                  ?><img src="../img/<?=$rows['Fotos']?>"><?php
                              echo "</div>";
                          echo "</div>";
                          echo "<div class='col'> <br><br><br><br><br><br><br>";
                              echo "<div class='well'>";
                                  echo "<div class='product_name'><h2>" .$rows['Nombre']. "</h2></div>";
                                  echo "<div> <span class='product_price'><h2> $" .$rows['Precio']. " USD</h2></span> </div>";
                                  echo "<hr class='singleline'>";
                                  echo "<div> <span class='product_info'><h4>" .$rows['Descripcion']. "</h4></span><br></div>";
                              echo "</div>";
                          echo "</div>";
                      echo "</div>";
                  echo "</div> <br><br><br><br><br><br>";


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
                          if(isset($_SESSION['mail'])){
                                $correo=$_SESSION['mail'];
                                echo "<form role='form' action='includes/agregarCarrito.inc.php' method='post'>";
                                echo "<input type='hidden' name='idProducto' value='$idP'>";
                                echo "<button type='submit' class='btn btn-success btn-block' name='agregar'><h2>Añadir al carrito</h2></button><br>";
                          }else{
                                echo "<button type='button' class='btn btn-success btn-block' onclick='openNav2()'><h2>Añadir al carrito</h2></button><br>";
                          }
                          echo "</div>";
                      echo "</div>";
                  echo "</div>";
              }
          }
        }
        ?>
      </main>
</body>
</html>
