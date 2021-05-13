<?php
    session_start();
    if(isset($_POST['indice'])){
      require '../conexion.php';
      $con = OpenCon();
      $correo = $_SESSION['mail'];
      $index=$_POST['indice'];
      $flag=0;
      for($i=0; $i<$index; $i++){
        $idP=$_POST['idProducto'.$i];
        $cantidad=$_POST['cantidad'.$i];
        $precio=$_POST['precio'.$i];
        $precioTotal = $precio*$cantidad;
        $sql="SELECT Cantidad_en_almacen FROM productos WHERE ID_Producto=?";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "Error con la base de datos";
        }else{
          mysqli_stmt_bind_param($stmt, "i", $idP);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if($row = mysqli_fetch_assoc($result)){
            if($cantidad>$row['Cantidad_en_almacen']){
              $flag=1;
            }else{
              $sql="INSERT INTO historial_de_compras (CorreoUsuario, ID_Producto, Cantidad, PrecioTotal) VALUES (?,?,?,?)";
              $stmt = mysqli_stmt_init($con);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "Error con la base de datos";
              }else{
                mysqli_stmt_bind_param($stmt, "siid", $correo, $idP, $cantidad, $precioTotal);
                mysqli_stmt_execute($stmt);
              }
              $canAlmacen = $row['Cantidad_en_almacen']-$cantidad;
              $sql="UPDATE productos SET Cantidad_en_almacen=? WHERE ID_Producto=?";
              $stmt=mysqli_stmt_init($con);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "Erro con la base de datos";
              }else{
                mysqli_stmt_bind_param($stmt, "ii", $canAlmacen, $idP);
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
            }
          }
        }
      }
      if($flag==1){
        echo "Cantidad en almacen excedida";
        echo "<form action='../carrito.php'>
              <button type='submit'> Regresar </button>
              </form>";
        mysqli_close($con);
      }else{
        mysqli_close($con);
        echo "<script type='text/javascript'>window.top.location='http://localhost/PHPProjects/DAWproyecto-main/php/compras.php';</script>"; exit;
      }
    }
 ?>
