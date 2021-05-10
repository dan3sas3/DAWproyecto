<?php
  function OpenCon()
 {
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "WQD4.hUCY3a-8_g";
   $db = "daw";
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

   return $conn;
 }

 function CloseCon($conn)
  {
    $conn -> close();
  }
?>
