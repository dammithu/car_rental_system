<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['car_id'])) {
    $carid = $_GET['car_id'];
    $carname = $_GET['car_name'];
    $acprice = $_GET['ac_price'];
    $nonacprice = $_GET['non_ac_price'];
    $acpriceday = $_GET['ac_price_per_day'];
    $nonacpriceday = $_GET['non_ac_price_per_day'];
    
    
    $updateQuery = "UPDATE cars
                    SET car_name = ?, ac_price = ?, non_ac_price = ?, ac_price_per_day = ?, non_ac_price_per_day = ?
                    WHERE car_id = ? ";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "ssssss", $carname, $acprice, $nonacprice, $acpriceday, $nonacpriceday, $carid);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            
            header("Location: admincar1.php");
            exit();
        } else {
            echo "car id not found or no changes made.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
