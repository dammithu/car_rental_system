<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['id'])) {
    $carId = $_GET['id'];

    
    $deleteQuery = "DELETE FROM cars WHERE car_id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $carId);
        mysqli_stmt_execute($stmt);

        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: admincar1.php");
            exit();
        } else {
            
            echo " car id not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    
    echo "Invalid request";
}
?>