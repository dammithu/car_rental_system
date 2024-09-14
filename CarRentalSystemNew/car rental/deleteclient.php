<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['username'])) {
    $clientUsername = $_GET['username'];

    
    $deleteQuery = "DELETE FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $clientUsername);
        mysqli_stmt_execute($stmt);

        
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirect back to the clients page or show a success message
            header("Location: adminclients1.php");
            exit();
        } else {
            
            echo "Client username not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        
        echo "Error preparing delete statement: " . mysqli_error($conn);
    }
} else {
    
    echo "Invalid request";
}
?>
