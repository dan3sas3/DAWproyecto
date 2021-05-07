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

    <style>
        .error {color: #FF0000;}
    </style>

    <title>Administración</title>
</head>
<body>
<?php
        // define variables and set to empty values
        $id = $nombre = $descripcion = $new_img_name = $precio = $cantidad = $fabricante = $origen = $tipo = $genero = "";
        $idErr = $nombreErr = $descripcionErr = $new_img_nameErr = $precioErr = $cantidadErr = $fabricanteErr = $origenErr = $tipoErr = $generoErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["id"])) {
                $idErr = "ID necesario";
            } else {
                $id = test_input($_POST["id"]);
            }

            if (empty($_POST["nombre"])) {
                $nombreErr = "Nombre necesario";
            } else {
                $nombre = test_input($_POST["nombre"]);
            }

            if (empty($_POST["descripcion"])) {
                $descripcionErr = "Descripción necesaria";
            } else {
                $descripcion = test_input($_POST["descripcion"]);
            }

            if (empty($_POST["my_image"])) {
                $new_img_nameErr = "Imagen necesaria";
            } else {
                $new_img_name = test_input($_POST["my_image"]);
            }

            if (empty($_POST["precio"])) {
                $precioErr = "Precio necesario";
            } else {
                $precio = test_input($_POST["precio"]);
            }

            if (empty($_POST["cantidad"])) {
                $cantidadErr = "Cantidad en stock necesaria";
            } else {
                $cantidad = test_input($_POST["cantidad"]);
            }

            if (empty($_POST["fabricante"])) {
                $fabricanteErr = "Fabricante del producto necesario";
            } else {
                $fabricante = test_input($_POST["fabricante"]);
            }

            if (empty($_POST["origen"])) {
                $origenErr = "Origen del producto necesario";
            } else {
                $origen = test_input($_POST["origen"]);
            }

            if (empty($_POST["tipo"])) {
                $tipoErr = "Tipo de producto necesario";
            } else {
                $tipo = test_input($_POST["tipo"]);
            }

            if (empty($_POST["genero"])) {
                $generoErr = "Género dirigido necesario";
            } else {
                $genero = test_input($_POST["genero"]);
            }
        }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
?>

<div class="container">
    <h2>Admin</h2>
    <div class="btn-group btn-group-lg">
        <a href="http://localhost:8888/ProyectoFinal/phpadmin/admin.php"><button type="button" class="btn btn-primary">Registrar producto</button></a>
        <button type="button" class="btn btn-primary">Actualizar producto</button>
        <button type="button" class="btn btn-primary">Ver Stock</button>
        <button type="button" class="btn btn-primary">Historial de compras</button>
        <button type="button" class="btn btn-primary">Usuarios registrados</button>
    </div>
</div>

<div class="container">
    <p><span class="error">* campo requerido.</span></p>
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID Producto: 
        <div class="form-group">
            <input type="number" min="0" name="id" class="form-control" value="<?php echo $id;?>">
            <span class="error">* <?php echo $idErr;?></span>
        </div>
        Nombre Producto: 
        <div class="form-group">
            <input type="texto" name="nombre" class="form-control" value="<?php echo $nombre;?>">
            <span class="error">* <?php echo $nombreErr;?></span>
        </div>
        Descripción Producto: 
        <div class="form-group">
            <input type="texto" name="descripcion" class="form-control" value="<?php echo $descripcion;?>">
            <span class="error">* <?php echo $descripcionErr;?></span>
        </div>

        Imagen del producto: <span class="error">* <?php echo $new_img_nameErr;?></span>
        <div class="form-group">
            <input type="file" name="my_image" class="form-control">
        </div>

        Precio: 
        <div class="form-group">
            <input type="number" min="0" step="0.01" name="precio" class="form-control" value="<?php echo $precio;?>">
            <span class="error">* <?php echo $precioErr;?></span>
        </div>
        Cantidad en almacén: 
        <div class="form-group">
            <input type="number" min="0" step="1" name="cantidad" class="form-control" value="<?php echo $cantidad;?>">
            <span class="error">* <?php echo $cantidadErr;?></span>
        </div>
        Fabricante del Producto: 
        <div class="form-group">
            <input type="text" name="fabricante" class="form-control" value="<?php echo $fabricante;?>">
            <span class="error">* <?php echo $fabricanteErr;?></span>
        </div>
        Origen del Producto: 
        <div class="form-group">
            <input type="text" name="origen" class="form-control" value="<?php echo $origen;?>">
            <span class="error">* <?php echo $origenErr;?></span>
        </div>
        Tipo de lentes: <span class="error">* <?php echo $tipoErr;?></span>
        <div class="form-group">
            <input type="radio" name="tipo" <?php if (isset($tipo) && $tipo == "Sunglasses") echo "checked";?> value="Sunglasses">Sunglasses<br>
            <input type="radio" name="tipo" <?php if (isset($tipo) && $tipo=="Eyeglasses") echo "checked";?> value="Eyeglasses">Eyeglasses
        </div>
        Para el género: <span class="error">* <?php echo $generoErr;?></span>
        <div class="form-group">
            <input type="radio" name="genero" <?php if (isset($genero) && $genero == "Hombre") echo "checked";?> value="Hombre">Hombre<br>
            <input type="radio" name="genero" <?php if (isset($genero) && $genero=="Mujer") echo "checked";?> value="Mujer">Mujer
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<?php
    if(isset($_POST['submit']) && isset($_FILES['my_image'])){
        // Crear una conexión
        $con = mysqli_connect("localhost:8889","root","root","DAW");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            echo "Connected to MySQL: ";
        }

        // escape variables for security
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);

        //$new_img_name = mysqli_real_escape_string($con, $_POST['my_image']);

        $precio = mysqli_real_escape_string($con, $_POST['precio']);
        $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
        $fabricante = mysqli_real_escape_string($con, $_POST['fabricante']);
        $origen = mysqli_real_escape_string($con, $_POST['origen']);
        $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
        $genero = mysqli_real_escape_string($con, $_POST['genero']);

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];      
        
        if($error === 0){
            if($img_size > 12500000){
                $em = "Archivo demasiado grande";
                header("Location: index.php?error=$em");
            }else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);


                    //Insertar a DB
                    $sql = "INSERT INTO Productos VALUES  ('$id', '$nombre', '$descripcion', '$new_img_name' , '$precio', '$cantidad', '$fabricante', '$origen', '$tipo', '$genero');";
                    if (!mysqli_query($con,$sql)) {
                        die('<br>Error: ' . mysqli_error($con));
                    }
                    echo "<br>1 record added";
                    mysqli_close($con);
                    // ///////////////////////////////////////////////////
                    header("Location: admin.php");
                }else{
                    $em = "<br>Tipo de archivo inválido";
                    echo ($em);
                }
            }
        }else{
            $em = "<br>Error desconocido";
            echo($em);
        }
    }
?>
</body>
</html>