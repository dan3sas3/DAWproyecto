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
  <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>

  <?php
    if(isset($_POST['submit'])){
      header("Location: adminStock.php");
    }
?>
  
</body>
</html>
      