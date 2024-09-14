<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

session_start(); // Start the session

// Check if the customer is logged in
if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customerlogin.php");
    exit; // Prevent further execution
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

// Retrieve the order ID from the session
$order_id = $_SESSION['order_id'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
    <!-- Your navigation content -->
</nav>
<div class="container" style="margin-top: 65px;">
    <div class="col-md-7" style="float: none; margin: 0 auto;">
        <div class="form-area">
            <h4>Payment</h4>
            <hr>
            
            <form action="paymentsucs.php" method="post">
                <div class="form-group">
                    <label for="order_id">Order ID:</label>
                    <!-- Display the order ID -->
                    <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo isset($order_id) ? $order_id : ''; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="card_holder_name">Card Holder Name:</label>
                    <!-- Input field for card holder name -->
                    <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" required>
                </div>
                <div class="form-group">
                    <label for="card_type">Card Type:</label>
                    <!-- Dropdown for card type -->
                    <select class="form-control" id="card_type" name="card_type" required>
                        <option value="visa">Visa</option>
                        <option value="credit">Credit Card</option>
                        <option value="debit">Debit Card</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <!-- Input field for card number -->
                    <input type="text" class="form-control" id="card_number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expire_date">Card Expiry Date:</label>
                    <!-- Input field for card expiry date -->
                    <input type="date" class="form-control" id="expire_date" name="expire_date" required>
                </div>
                <div class="form-group">
                    <!-- You can add more details or messages here -->
                </div>
                <!-- Pay Now button -->
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </form>
            
        </div>
    </div>
</div>
<footer class="site-footer">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h5>© <?php echo date("Y"); ?> Car Rentals</h5>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
