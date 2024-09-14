<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['feedback_id'])) {
    $feedback_id = $_GET['feedback_id'];

    
    $deleteQuery = "DELETE FROM feedback WHERE feedback_id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $feedback_id);
        mysqli_stmt_execute($stmt);

        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: myfeedback.php");
            exit();
        } else {
            
            echo "Feedback ID not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    
    echo "Invalid request";
}
?>
