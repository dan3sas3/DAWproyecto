<?php
  require "header.php";
?>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <title>Usuario</title>
</head>
    <main>
        <div class="container">
            <br><br>
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
                        <h2> Datos del Usuario </h2>
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

                    $name = $row['Nombre_del_usuario'];
                    $date = $row['Fecha_de_Nacimiento'];
                    $correo = $row['Correo_electronico'];
                    $card = $row['Numero_de_tarjeta_bancaria'];
                    $address = $row['Direccion_Postal'];
                    $contra = $row['Contraseña'];
                }

                echo "</tbody> </table> </div>";

                ?>

                <?php
                    echo "<br><br><h2>Historial de compras del usuario</h2>";

                    $result = mysqli_query($con,"SELECT * FROM historial_de_compras WHERE CorreoUsuario='$usuario';");
                    echo "<div class='container'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>ID Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio total por producto</th>
                                    </tr>
                                </thead>

                                <tbody>";

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_Producto'] . "</td>";
                        echo "<td>" . $row['Cantidad'] . "</td>";
                        echo "<td>" . $row['PrecioTotal'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody> </table> </div>";

                ?>

                <br><br>
                <div class="container">
                    <h3>Modificar información de perfil</h3>
                    <h6>Por favor, introduzca la información a modificar</h6>
                    <h7><span class="error">* campo requerido.</span></h7>
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Nombre completo:
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" value="<?php echo $name;?>">
                        <span class="error">* <?php echo $NombreUsuarioErr;?></span>
                    </div>
                    Fecha de nacimiento:
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" value="<?php echo $date;?>">
                        <span class="error">* <?php echo $fechaErr;?></span>
                    </div>
                    Número de tarjeta bancaria:
                    <div class="form-group">
                        <input type="number" step="1.0" min="0" max="9999999999999999"class="form-control" name="tarjeta" value="<?php echo $card;?>">
                        <span class="error">* <?php echo $tarjetaErr;?></span>
                    </div>
                    Dirección postal:
                    <div class="form-group">
                        <input type="text" class="form-control" name="direccion" value="<?php echo $address;?>">
                        <span class="error">* <?php echo $direccionErr;?></span>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>

                <?php
                $bandera = FALSE;
                // escape variables for security
                if(isset($_POST['nombre'])){
                    $NombreUsuario = mysqli_real_escape_string($con, $_POST['nombre']);
                }
                if(isset($_POST['fecha'])){
                    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
                }
                if(isset($_POST['tarjeta'])){
                    $tarjeta = mysqli_real_escape_string($con, $_POST['tarjeta']);
                }
                if(isset($_POST['direccion'])){
                    $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
                }
                $sql="UPDATE Usuario SET Nombre_del_usuario=?, Fecha_de_Nacimiento=?,  Numero_de_tarjeta_bancaria=?, Direccion_Postal=? WHERE Correo_electronico=?";
                $stmt=mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Error con la base de datos";
                }
                else{
                    mysqli_stmt_bind_param($stmt, "ssiss", $NombreUsuario, $fecha, $tarjeta, $direccion, $usuario);
                    mysqli_stmt_execute($stmt);
                    mysqli_close($con);
                }
                ?>
        </div>
    </main>
</body>
</html>
