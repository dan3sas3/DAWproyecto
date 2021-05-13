<?php
  require "header.php";
 ?>
 <head>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
   <style>
       *{
         font-family: 'Poppins', sans-serif;
       }
   </style>
    <style>
        .error {color: #FF0000;}
    </style>
    <title>Registrar</title>

</head>
<main>
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
            include 'conexion.php';
            $con = OpenCon();
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            // escape variables for security
            $NombreUsuario = mysqli_real_escape_string($con, $_POST['nombre']);
            $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $tarjeta = mysqli_real_escape_string($con, $_POST['tarjeta']);
            $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
            $contraseña = mysqli_real_escape_string($con, $_POST['contraseña']);

            $sql="SELECT Correo_electronico from usuario where Correo_electronico=?";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              exit();
            }else{
              mysqli_stmt_bind_param($stmt, "s", $email);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              $resultCheck = mysqli_stmt_num_rows($stmt);
              if($resultCheck>0){
              echo "<p style=\"color:red; margin-left:125px;\">*Email ya utilizado, pruebe con otro</p>";
                exit();
              }else{
                  $sql = "INSERT INTO Usuario (Nombre_del_usuario, Correo_electronico, Contraseña, Fecha_de_Nacimiento, Numero_de_tarjeta_bancaria, Direccion_Postal) VALUES (?,?,?,?,?,?)";
                  $stmt = mysqli_stmt_init($con);
                  if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                  }else{
                    $hashedPwd = password_hash($contraseña, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssis", $NombreUsuario, $email, $hashedPwd, $fecha, $tarjeta, $direccion);
                    mysqli_stmt_execute($stmt);
                    echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/inicio.php';</script>"; exit;
                    mysqli_close($con);
              }
            }
          }
        }
    ?>
  </main>
</body>
</html>
