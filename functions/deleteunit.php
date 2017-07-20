<?php
$conn = mysqli_connect( "127.0.0.1", "root", "", "yuni_yuni" );
$id=$_GET['id'];

   $sql1 ="DELETE FROM units WHERE Unit_Code='$id'";
   if ($conn->query($sql1)) {
        echo 'Unit deleted Successfully!';
  header("location: ../Units.php");
    $conn->close();
    }
    else{
        echo 'Unit not deleted!';
    header("location: ../Units.php");
    $conn->close();
   }
