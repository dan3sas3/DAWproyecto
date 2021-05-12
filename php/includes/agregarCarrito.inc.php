<?php
    #agregar session_start chance
    session_start();
    if(isset($_POST['agregar'])){
      require '../conexion.php';
      $con = OpenCon();
      $correo = $_SESSION['mail'];
      $idP = $_POST['idProducto'];
      $sql = "INSERT into carrito (CorreoUsuario, ID_Producto) VALUES (?, ?)";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location ../incio.php?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "si", $correo, $idP);
        mysqli_stmt_execute($stmt);
        #echo "<br>1 record added";
        mysqli_close($con);
        header("Location:../carrito.php?success");
      }
    }
 ?>
