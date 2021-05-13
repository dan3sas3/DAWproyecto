<?php
  require "header.php"
 ?>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="../css/productos.css">
    <link rel="stylesheet" type="text/css" href="../css/stickyMenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        *{
          font-family: 'Poppins', sans-serif;
        }
        #botones{
            margin:auto;
            width:50%;
            padding: 5px;
            text-align: center;
            font-size: 20px;
          }

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
    ></script>
    <script type="text/javascript" src="../js/filtro.js">  </script>
    <script>
        function myFunction() {
            document.getElementById("GFG").submit();
        }
    </script>
</head>
    <!-- Filtro -->
    <div class="header">
        <h1>Productos</h1><br>
    </div>
    <div id='botones' class='form-check'>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input class="form-check-input" style="display:inline;" type='radio' name='lentes' value='Eyeglasses'>Eyeglasses<p style="display:inline;">                              </p>
        <input class="form-check-input" style="display:inline;" type='radio' name='lentes' value='Sunglasses'>Sunglasses<p style="display:inline;">                              </p>
        <input class="form-check-input" style="display:inline;" type='radio' name='lentes' value='all'>All
        <br>
        <button style="width:25%;" type='submit'>Filtrar</button>
      </form>
    </div>
<main>

<!-- Productos -->

<?php
  #para el filtrp

  include 'conexion.php';
  $con = OpenCon();
  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if (empty($_POST["lentes"])) {
    $lentes="";
  }else{
    $lentes = $_POST["lentes"];
  }
  if($lentes=='Eyeglasses'){
    $sql = "SELECT ID_Producto, Nombre, Fotos, Precio, Tipo FROM Productos WHERE Tipo='Eyeglasses'";
  }else if($lentes=='Sunglasses'){
    $sql = "SELECT ID_Producto, Nombre, Fotos, Precio, Tipo FROM Productos WHERE Tipo='Sunglasses'";
  }else{
    $sql = "SELECT ID_Producto, Nombre, Fotos, Precio, Tipo FROM Productos";
  }
  $res = mysqli_query($con,  $sql);
  $contador = 0;
  $idP = "";

            echo "<center><div class='container'><div class='containerB'>";
                echo "<div class='categories'>";
                        echo "<div class='row'>";
    if (mysqli_num_rows($res) > 0) {
        while ($rows = mysqli_fetch_assoc($res)) {
                if($contador == 3){
                        echo "<div class='row'>";
                      $contador = 0;}
                            echo "<div class='col-4'>";
                                $idP = $rows['ID_Producto'];
                                echo "<form id='GFG' method='post' enctype='multipart/form-data' action='producto.php'>";
                                    echo "<input type='hidden' name='identificador' value='$idP'>";
                                    echo "<div class='cuadro bg-image hover-zoom '>";
                                        echo "<h4>" .$rows['Nombre']. "</h4>";
                                        ?><img src="../img/<?=$rows['Fotos']?>"><?php
                                        echo "<br>";
                                        echo "<p>$" .$rows['Precio']. " USD</p>";
                                        echo "<input type='submit' value='Ver más'>";
                                    echo "</div>";
                                echo "</form>";
                            echo "</div>";
                    if($contador == 2){
                        echo "</div>";
                    }
                    $contador++;
        }
    }
                        echo "</div>";
                    #echo "</div>";
                echo "</div>";
            echo "</div></div></center>";
?>
</body>
</html>
</main>
