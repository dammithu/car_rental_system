<?php

session_start();
require 'connection.php'; 

$conn = Connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = test_input($_POST["message"]);

    // SQL query to insert data into the "feedback" table
    $sql = "INSERT INTO feedback (message) VALUES ('$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: feedback.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
