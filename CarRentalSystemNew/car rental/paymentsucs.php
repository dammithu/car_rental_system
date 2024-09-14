<?php
session_start(); // Start the session

if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customerlogin.php");
    exit; // Add exit to prevent further execution
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have retrieved $payment_id and $order_id from the previous page
$order_id = $_POST['order_id'] ?? null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $card_holder_name = $_POST['card_holder_name'];
    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expire_date = $_POST['expire_date'];

    // Validate form data (you can add more validation as needed)
    if (empty($order_id) || empty($card_holder_name) || empty($card_type) || empty($card_number) || empty($expire_date)) {
        // Handle empty fields
        $_SESSION['error_message'] = "All fields are required.";
        header("location: payment_confirmation.php");
        exit;
    }

    // Insert payment details into the database
    $insert_query = "INSERT INTO payment (booking_id, card_holder_name, card_type, card_number, expire_date, payment_status)
                     VALUES ('$order_id', '$card_holder_name', '$card_type', '$card_number', '$expire_date', 'Success')";

    if ($conn->query($insert_query) === TRUE) {
        // Payment successful
        $_SESSION['success_message'] = "Payment successful.";
        header("location: paysucc.php"); // Redirect to success page
        exit;
    } else {
        // Error inserting payment
        $_SESSION['error_message'] = "Error processing payment: " . $conn->error;
        header("location: payment_confirmation.php"); // Redirect back to payment page with error message
        exit;
    }
}

// Close database connection
$conn->close();
?>
