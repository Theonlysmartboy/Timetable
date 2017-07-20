<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "yuni_yuni");
$id = $_GET['id'];

$sql1 = "DELETE FROM lecture_halls WHERE Id='$id'";
if ($conn->query($sql1)) {
    echo 'HALL deleted Successfully!';
    header("location: ../lecture halls.php");
    $conn->close();
} else {
    echo 'HALL not deleted!';

    $conn->close();
}
