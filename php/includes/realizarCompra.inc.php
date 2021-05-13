<?php
    session_start();
    if(isset($_POST['indice'])){
      require '../conexion.php';
      $con = OpenCon();
      $correo = $_SESSION['mail'];
      $index=$_POST['indice'];
      for($i=0; $i<$index; $i++){
        $idP=$_POST['idProducto'.$i];
        $cantidad=$_POST['cantidad'.$i];
        $precio=$_POST['precio'.$i];
        $sql="INSERT INTO historial_de_compras (CorreoUsuario, ID_Producto, Cantidad, PrecioTotal) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "Error con la base de datos";
        }else{
          mysqli_stmt_bind_param($stmt, "siii", $correo, $idP, $cantidad, $precio);
          mysqli_stmt_execute($stmt);
        }
        $sql = "DELETE FROM carrito WHERE CorreoUsuario=? AND ID_Producto=?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "Error con la base de datos";
        }else{
          mysqli_stmt_bind_param($stmt, "si", $correo, $idP);
          mysqli_stmt_execute($stmt);
        }
        #echo $_POST['cantidad'.$i];
        #echo "<br>";
        #echo $_POST['idProducto'.$i];
        #echo "<br>";
      }
      $_SESSION['flag']=0;
      mysqli_close($con);
      echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/compras.php';</script>"; exit;
      #echo $index;
      #echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/carrito.php';</script>"; exit;
    }

 ?>
