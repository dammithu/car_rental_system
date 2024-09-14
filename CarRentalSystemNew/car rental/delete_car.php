<?php
session_start();
require 'connection.php';

// Check if car_id is provided in the URL
if(isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    
    // Establish database connection
    $conn = Connect();
    
    // Query to delete the car with the provided car_id
    $deleteQuery = "DELETE FROM cars WHERE car_id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $car_id);
        mysqli_stmt_execute($stmt);

        // Check if deletion was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirect back to the page displaying cars after deletion
            header("Location: mycars.php");
            exit();
        } else {
            // Car not found
            echo "Car not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error preparing delete statement
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    // Car ID not provided in the URL
    echo "Invalid request";
}
?>
