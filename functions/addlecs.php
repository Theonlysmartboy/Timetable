<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "yuni_yuni");
$pfno = $conn->escape_string($_POST['pfno']);
$title = $conn->escape_string($_POST['title']);
$fname = $conn->escape_string($_POST['fname']);
$mname = $conn->escape_string($_POST['mname']);
$lname = $conn->escape_string($_POST['lname']);
$dept = $conn->escape_string($_POST['dept']);
$result = $conn->query("SELECT * FROM lecturers WHERE Pf_No = '$pfno'") or die($conn->error);

// unit exists if the rows returned are more than 0
if ($result->num_rows > 0) {

    echo 'The department already exists in the database!';
} else { // Unit doesn't exist in a database, proceed...
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO lecturers (Title,First_Name,Middle_Name,Last_Name,Pf_No,Dept_Id) VALUES ('$title','$fname','$mname','$lname','$pfno','$dept')";
    // Add user to the database
    if ($conn->query($sql)) {
        echo 'The department has been added successfully';
        header("location: ../Lecturers.php");
    } else {
        echo 'The department has not been added!';
        die($conn->error);
    }
}

