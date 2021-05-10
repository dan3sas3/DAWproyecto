<?php

  if(isset($_POST['login-submit'])){
    require '../conexion.php';
    $con = OpenCon();
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    if(empty($email)||empty($password)){
      header("Location: ../inicio.php?error=camposVacios");
      exit();
    }
    else{
      $sql = "SELECT * from usuario where Correo_electronico=?;";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location ../incio.php?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password, $row['Contraseña']);
            if($pwdCheck==false){
              header("Location: ../inicio.php?error=wrongPassword");
              exit();
            }else if($pwdCheck==true){
              session_start();
              $_SESSION['nombre']=$row['Nombre_del_usuario'];
              $_SESSION['mail']=$row['Correo_electronico'];
              header("Location: ../inicio.php?login=success");
              exit();
            }else{
                header("Location: ../inicio.php?error=unexpectedError");
                exit();
            }
        }else{
          header("Location: ../inicio.php?error=nouser");
          exit();
        }
      }
    }
  }else{
    header("Location ../inicio.php");
  }
