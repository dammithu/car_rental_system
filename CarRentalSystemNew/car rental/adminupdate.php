<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['admin_username'])) {
    $username = $_GET['admin_username'];
    $newUsername = $_GET['new_admin_username'];
    $password = $_GET['admin_password'];
    
    // Assuming your users table has the structure similar to this
    $updateQuery = "UPDATE users
                    SET username = ?, password = ?
                    WHERE username = ? AND role = 'admin'";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "sss", $newUsername, $password, $username);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: adminacc.php");
            exit();
        } else {
            echo "Admin not found or no changes made.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
