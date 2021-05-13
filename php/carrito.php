<?php
  require "header.php"
 ?>
 <script type="text/javascript" src="../js/carrito.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 <script>
   $(document).ready(function(){
      $("#myForm").submit(function(){
          $(this).closest('tr').remove();
       });
   });
 </script>
 <main>
   <?php
      $flag=0;
      require 'conexion.php';
      $con = OpenCon();
      $mail=$_SESSION['mail'];
      $sql = "SELECT * from carrito where CorreoUsuario=?;";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Error conectando a la base de datos";
      }else{
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        #mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_get_result($stmt);
        #mysqli_stmt_store_result($stmt);
        $resultCheck = $result->num_rows;
        if($resultCheck==0){
            $flag=1;
        }
        echo "<div class='container' ng-app='' ng-init='x0=1; x1=1; x2=1; x3=1; x4=1; x5=1'>
              <h2>Lista del carrito</h2>
              <p>Estos son los artículos que llevas en tu carrito de compras. Puedes modificarlo si gustas</p>
              <table class='table' id='myTable'>
              <thead>
                  <tr>
                  <th></th>
                  <th>Artículo</th>
                  <th>Descripción del producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  </tr>
              </thead>
              <tbody>";
        $contador=0;
        $indice=0;
        $stack=array_fill(0,7,0);
        $arrProductos=array_fill(0,7,0);
        while($row = mysqli_fetch_assoc($result)){
          $idP=$row['ID_Producto'];
          $sql2 = "SELECT Nombre, Descripcion, Fotos, Precio FROM Productos where ID_Producto=".$idP;
          $res = mysqli_query($con, $sql2);
          if($rows=mysqli_fetch_assoc($res)){
            $stack[$indice]=$rows['Precio'];
            $arrProductos[$indice]=$idP;
            echo "<tr>";
            echo "<td>
                    <form name='myForm' role='form' action='includes/borrarDelCarrito.inc.php' method='post'>
                    <input type='hidden' name='IDProducto' value='".$idP."'>
                    <button type='submit'>Eliminar</button>
                    </form>
                  </td>";
            echo "<td>".$rows['Nombre']."</td>";
            echo "<td>".$rows['Descripcion']."</td>";
            echo "<td>".$rows['Precio']."</td>";
            echo "<td>
                  <input type='number' min='1' ng-model='x".$contador."' value='1'/>
                </td>";
            echo "<td>{{".$rows['Precio']."*x".$contador."}}</td>";
            echo "</tr>";
            $contador++;
            $indice++;
          }
        }
        echo "<tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>TOTAL:</td>
              <td>{{".$stack[0]."*x0+".$stack[1]."*x1+".$stack[2]."*x2+".$stack[3]."*x3+".$stack[4]."*x4+".$stack[5]."*x5}}</td>";
        echo "<tr>
              <td>
                <form action='productos.php'>
                <button type='submit' class='btn btn-success'>VER PRODUCTOS</button></td>
                </form>
              <td></td>
              <td></td>
              <td></td>
              <td></td>";
              if($flag==0){
                echo "<td>
                      <form action='includes/realizarCompra.inc.php' method='post'>";
                for($i=0; $i<$indice; $i++){
                    echo "<input type='hidden' value='{{x".$i."}}' name='cantidad".$i."'>";
                    echo "<input type='hidden' value='".$arrProductos[$i]."' name='idProducto".$i."'>";
                    echo "<input type='hidden' value='".$stack[$i]."' name='precio".$i."'>";
                }
                    echo"<input type='hidden' value='".$i."' name='indice'>";
                    echo "<button type='submit' class='btn btn-success'>COMPRAR</button>";
                    echo "</td>";
              }else{
                echo "<td></td>";
              }
        echo "</tbody>
            </table>";
      }
    ?>
