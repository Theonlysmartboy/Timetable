<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "yuni_yuni");
$name = $conn->escape_string($_POST['name']);
$code = $conn->escape_string($_POST['code']);
$prog = $conn->escape_string($_POST['prog']);
$lec = $conn->escape_string($_POST['lec']);
$result = $conn->query("SELECT * FROM units WHERE Unit_Code = '$code'") or die($conn->error);

// unit exists if the rows returned are more than 0
if ($result->num_rows > 0) {

    echo 'The department already exists in the database!';
} else { // Unit doesn't exist in a database, proceed...
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO units (Unit_Name,Prog_Id,Unit_Code,Lecturer) VALUES ('$name','$prog','$code','$lec')";
    // Add user to the database
    if ($conn->query($sql)) {
        echo 'The department has been added successfully';
        header("location: ../Units.php");
    } else {
        echo 'The department has not been added!';
        die($conn->error);
    }
}

