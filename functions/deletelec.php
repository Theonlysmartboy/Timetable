<?php
$conn = mysqli_connect( "127.0.0.1", "root", "", "yuni_yuni" );
$id=$_GET['id'];

   $sql1 ="DELETE FROM lecturers WHERE Pf_No='$id'";
   if ($conn->query($sql1)) {
        echo 'Unit deleted Successfully!';
  header("location: ../Lecturers.php");
    $conn->close();
    }
    else{
        echo 'Unit not deleted!';
    header("location: ../Lecturers.php");
    $conn->close();
   }
