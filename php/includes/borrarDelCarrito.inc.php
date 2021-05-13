<?php
  session_start();
  require "../conexion.php";
  $con = OpenCon();
  $correo = $_SESSION['mail'];
  $idP = $_POST['IDProducto'];
  $sql = "DELETE FROM carrito where CorreoUsuario=? and ID_Producto=?";
  $stmt = mysqli_stmt_init($con);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/carrito.php';</script>"; exit;
  }else{
    mysqli_stmt_bind_param($stmt, "si", $correo, $idP);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
    echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/carrito.php';</script>"; exit;

  }
