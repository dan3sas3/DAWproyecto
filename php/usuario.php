<?php
  require "header.php";
?>
<head>
    <title>Usuario</title>
</head>
    <main>
        <div class="container">
            <br><br>
            <h2>Datos del Usuario</h2>
            <?php
                $usuario = $_SESSION['mail'];
                //----------------------------------------------------  SQL  -----------------------------------------------------------
                // Crear una conexión
                include 'conexion.php';
                $con = OpenCon();
                // Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }


                $datos = mysqli_query($con,"SELECT * FROM Usuario WHERE Correo_electronico = '$usuario';");

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

                while($row = mysqli_fetch_array($datos)) {
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
            <br><br>
            <h2>Historial de compras del usuario</h2>
        </div>
    </main>
</body>
</html>
