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
        <title>Usuarios Registrados</title>
    </head>
    <body>
        <!-- Button group -->
        <div class="container">
            <h2>Admin</h2>
            <div class="btn-group btn-group-lg">
              <a class="btn btn-primary btn-lg" href="http://localhost/PHPProjects/DAWproyecto-main/phpadmin/admin.php" role="button">Registrar producto</a>
              <a class="btn btn-primary" href="http://localhost/PHPProjects/DAWproyecto-main/phpadmin/adminActualizar.php" role="button">Actualizar producto</a>
              <a class="btn btn-primary" href="http://localhost/PHPProjects/DAWproyecto-main/phpadmin/adminStock.php" role="button">Ver Stock</a>
              <a class="btn btn-primary" href="http://localhost/PHPProjects/DAWproyecto-main/phpadmin/adminHistorial.php" role="button">Historial de compras</a>
              <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="http://localhost/PHPProjects/DAWproyecto-main/phpadmin/adminUsuarios.php" role="button">Usuarios registrados</a>
            </div>
        </div>

        <?php
            //----------------------------------------------------  SQL  -----------------------------------------------------------
            // Crear una conexión
            include 'conexion.php';
            $con = OpenCon();

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $result = mysqli_query($con,"SELECT * FROM Usuario;");
            echo "<div class='container'>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>Correo electrónico</th>
                                <th>Nombre completo del usuario</th>
                                <th>Fecha de nacimiento</th>
                                <th>Tarjeta bancaria</th>
                                <th>Dirección Postal</th>
                            </tr>
                        </thead>

                        <tbody>";

            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Correo_electronico'] . "</td>";
                echo "<td>" . $row['Nombre_del_usuario'] . "</td>";
                echo "<td>" . $row['Fecha_de_Nacimiento'] . "</td>";
                echo "<td>" . $row['Numero_de_tarjeta_bancaria'] . "</td>";
                echo "<td>" . $row['Direccion_Postal'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody> </table> </div>";

            mysqli_close($con);
        ?>
    </body>
  </html>
