<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "yuni_yuni");

$name = $conn->escape_string($_POST['name']);

$result = $conn->query("SELECT * FROM lecture_halls WHERE Name = '$name'") or die($conn->error);

// unit exists if the rows returned are more than 0
if ($result->num_rows > 0) {

    echo 'The department already exists in the database!';
} else { // Unit doesn't exist in a database, proceed...
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO lecture_halls (Name) VALUES ('$name')";
    // Add user to the database
    if ($conn->query($sql)) {
        echo 'The department has been added successfully';
        header("location: ../Lecture halls.php");
    } else {
        echo 'The department has not been added!';
        die($conn->error);
    }
}

