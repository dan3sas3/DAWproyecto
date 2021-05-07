<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desplegar</title>
</head>
<body>
<?php 
          $con = mysqli_connect("localhost:8889","root","root","DAW");
          $sql = "SELECT Fotos FROM Productos ORDER BY ID_Producto";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
            <div class="alb">
              <img src="../img/<?=$images['Fotos']?>">
            </div>
          		
<?php } }?>
  
</body>
</html>
      