<?php
require_once '../core/init.php';
$SC = $conn->escape_string($_POST['Schedule']);
$dpname = $conn->escape_string($_POST['Unit']);
$result = $conn->query("SELECT * FROM timetable WHERE Schedule = '$SC' AND Unit='$dpname'") or die($conn->error);

// Units and Schedule exists if the rows returned are more than 0
if ($result->num_rows > 0) {
    echo "That time and Room Is already Occupied";
        
} else { 
    $sql = "INSERT INTO timetable (Schedule,Unit) VALUES ('$dpname',$SC)";
    // Add user to the database
    if ($conn->query($sql)) {
        echo 'Timetable has been added successfully';
        
    } else {
        echo 'Timetable has not been added please try again';
       
    }
}
