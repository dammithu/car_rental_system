<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from booking table
    $deleteQuery = "DELETE FROM booking WHERE id = ?";
    $deleteStmt = mysqli_prepare($conn, $deleteQuery);

    if ($deleteStmt) {
        mysqli_stmt_bind_param($deleteStmt, "s", $id);
        mysqli_stmt_execute($deleteStmt);

        // Check if a row was affected
        if (mysqli_stmt_affected_rows($deleteStmt) > 0) {
            // Update the availability status in the cars table
            $updateCarQuery = "UPDATE cars SET car_availability = 'yes' WHERE car_id IN (SELECT car_id FROM booking WHERE id = ?)";
            $updateCarStmt = mysqli_prepare($conn, $updateCarQuery);

            if ($updateCarStmt) {
                mysqli_stmt_bind_param($updateCarStmt, "s", $id);
                mysqli_stmt_execute($updateCarStmt);
                mysqli_stmt_close($updateCarStmt);
            } else {
                echo "Error preparing car update statement: " . mysqli_error($conn);
            }

            // Redirect back to the rentedcars page or show a success message
            header("Location: rentedcars.php");
            exit();
        } else {
            echo "Record not found.";
        }

        mysqli_stmt_close($deleteStmt);
    } else {
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
