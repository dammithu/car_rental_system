<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['customer_username'])) {
    $customertUsername = $_GET['customer_username'];
    $newcustomertUsername = $_GET['newcustomer_username'];
    $customername = $_GET['customer_name'];
    $customeremail = $_GET['customer_email'];
    $customerphone = $_GET['customer_phone'];
    $customeradd = $_GET['customer_address'];
    
    
    $updateQuery = "UPDATE users
                    SET username = ?,name = ?, email = ?, phone = ?, address = ?
                    WHERE username = ? ";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "ssssss",$newcustomertUsername, $customername, $customeremail, $customerphone, $customeradd, $customertUsername);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: admincustomer1.php");
            exit();
        } else {
            echo "Customer username not found or no changes made.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
