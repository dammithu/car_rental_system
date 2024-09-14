<?php 
session_start();
require 'connection.php';
$conn = Connect();

// Check if the user is logged in
if(!isset($_SESSION['login_client'])) {
    // Redirect to login page or handle as needed
    header("Location: login.php");
    exit();
}

// Get the currently logged-in client username
$client_username = $_SESSION['login_client'];

// Query to get cars for the logged-in client
$query = "SELECT * FROM cars WHERE client_username = '$client_username'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/userss.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <title>My Cars</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">My Cars</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td bgcolor="black">Car ID</td>
                                <td bgcolor="black">Car Name</td>
                                <td bgcolor="black">Delete</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['car_id']; ?></td>
                                    <td><?php echo $row['car_name']; ?></td>
                                    <td><a href="delete_car.php?car_id=<?php echo $row['car_id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center><a href="index.php" class="btn btn-danger">Back</a></center>
</body>
</html>
