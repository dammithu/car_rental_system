<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();

$query = "SELECT * FROM booking";
$result1 = mysqli_query($conn, $query);
 ?>
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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">


    <title>Bookings</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">BOOKING DETAILS</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td bgcolor="black">Customer username</td>
                                <td bgcolor="black">Car id</td>
                                
                                <td bgcolor="black">Booking date</td>
                                <td bgcolor="black">Rent start date</td>
                                <td bgcolor="black">Rent end date</td>
                                <td bgcolor="black">Car return date</td>
                                <td bgcolor="black">Fare</td>
                                <td bgcolor="black">Charge type</td>
                                <td bgcolor="black">Distance</td>
                                <td bgcolor="black">Total Amount</td>
                                <td bgcolor="black">Return Status</td>
                                <td bgcolor="black">Delete </td>
                                <td bgcolor="black">Cancel</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['customer_username']; ?></td>
                                    <td><?php echo $row['car_id']; ?></td>
                                    
                                    <td><?php echo $row['booking_date']; ?></td>
                                    <td><?php echo $row['rent_start_date']; ?></td>
                                    <td><?php echo $row['rent_end_date']; ?></td>
                                    <td><?php echo $row['car_return_date']; ?></td>
                                    <td><?php echo $row['fare']; ?></td>
                                    <td><?php echo $row['charge_type']; ?></td>
                                    <td><?php echo $row['distance']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['return_status']; ?></td>
                                    <td><a href="rentedcardelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
                                    <td><a href="rentedcardelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Cancel</a></td>
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
    <center><a href="index.php" class="btn btn-danger" >Back</a></center>
</body>
</html>
