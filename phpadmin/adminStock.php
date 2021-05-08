<!DOCTYPE HTML>
  <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .alb {
                width: 200px;
                height: 200px;
                padding: 5px;
		    }
            .alb img {
                width: 100%;
                height: 100%;
            }
        </style>
        
        <title>Stock</title>
    </head>
    <body>
        <!-- Button group -->
        <div class="container">
            <h2>Admin</h2>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary" href="http://localhost:8888/ProyectoFinal/phpadmin/admin.php" role="button">Registrar producto</a>
                <a class="btn btn-primary" href="http://localhost:8888/ProyectoFinal/phpadmin/adminActualizar.php" role="button">Actualizar producto</a>
                <a class="btn btn-primary btn-lg active" aria-pressed="true" href="http://localhost:8888/ProyectoFinal/phpadmin/adminStock.php" role="button">Ver Stock</a>
                <a class="btn btn-primary" href="#" role="button">Historial de compras</a>
                <a class="btn btn-primary" href="http://localhost:8888/ProyectoFinal/phpadmin/adminUsuarios.php" role="button">Usuarios registrados</a>
            </div>
        </div>

        <?php
            //----------------------------------------------------  SQL  -----------------------------------------------------------
            // Crear una conexión
            $con = mysqli_connect("localhost:8889","root","root","DAW");
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            //$sqlFotos = "SELECT Fotos FROM Productos ORDER BY ID_Producto";
            $sql = "SELECT * FROM Productos";
            //$resFotos = mysqli_query($con,  $sqlFotos);
            $res = mysqli_query($con,  $sql);

            echo "<div class='container'>
                    <table class='table table-striped'>
                        <thead>    
                            <tr>
                                <th>ID del producto</th>
                                <th>Nombre del producto</th>
                                <th>Descripción del producto</th>
                                <th>Foto</th>
                                <th>Precio</th>
                                <th>Cantidad en almacén</th>
                                <th>Fabricante</th>
                                <th>Lugar de origen</th>
                                <th>Tipo de lente</th>
                                <th>Género</th>
                            </tr>
                        </thead>
                        
                        <tbody>";
            
            
            
            if (mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) {  
                    echo "<tr>";
                    echo "<td>" . $images['ID_Producto'] . "</td>";
                    echo "<td>" . $images['Nombre'] . "</td>";
                    echo "<td>" . $images['Descripcion'] . "</td>";

                    echo "<td>" ; 
        ?>
            <div class="alb">
                <img src="../img/<?=$images['Fotos']?>">
            </div>
        <?php 
                    echo "</td>";  
                    echo "<td>" . $images['Precio'] . "</td>";
                    echo "<td>" . $images['Cantidad_en_almacen'] . "</td>";
                    echo "<td>" . $images['Fabricante'] . "</td>";
                    echo "<td>" . $images['Origen'] . "</td>";
                    echo "<td>" . $images['Tipo'] . "</td>";
                    echo "<td>" . $images['Genero'] . "</td>";
                    echo "</tr>";
                } 
                echo "</tbody> </table> </div>";
            }
        ?>
    </body>
  </html>
      