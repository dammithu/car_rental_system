<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['client_username'])) {
    $clientUsername = $_GET['client_username'];
    $newclientUsername = $_GET['newclient_username'];
    $clientname = $_GET['client_name'];
    $clientemail = $_GET['client_email'];
    $clientphone = $_GET['client_phone'];
    $clientadd = $_GET['client_address'];
    
    
    $updateQuery = "UPDATE users
                    SET username = ?,name = ?, email = ?, phone = ?, address = ?
                    WHERE username = ? ";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "ssssss",$newclientUsername, $clientname, $clientemail, $clientphone, $clientadd, $clientUsername);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: adminclients1.php");
            exit();
        } else {
            echo "Client username not found or no changes made.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
