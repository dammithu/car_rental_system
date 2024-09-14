<!DOCTYPE html>
<html>

<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bookingconfirm.css" />
</head>

<body>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">
               Car Rentals 
            </a>
        </div>

        <?php
            if(isset($_SESSION['login_client'])){
        ?> 
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                </li>
                <li>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li> <a href="entercar.php">Add Car</a></li>
                        <li> <a href="enterdriver.php"> Add Driver</a></li>
                        <li> <a href="clientview.php">View</a></li>
                    </ul>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
        
        <?php
            }
            else if (isset($_SESSION['login_customer'])){
        ?>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                </li>
                <ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garagge <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li> <a href="prereturncar.php">Return Now</a></li>
                        <li> <a href="mybookings.php"> My Bookings</a></li>
                    </ul>
                    </li>
                </ul>
                <li>
                    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>

        <?php
        }
            else {
        ?>

        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="clientlogin.php">Employee</a>
                </li>
                <li>
                    <a href="customerlogin.php">Customer</a>
                </li>
                <li>
                    <a href="#"> FAQ </a>
                </li>
            </ul>
        </div>
        <?php   }
        ?>
      
    </div>
   
</nav>

<?php

$type = $_POST['radio'];
$charge_type = $_POST['radio1'];
$customer_username = $_SESSION["login_customer"];
$car_id = $conn->real_escape_string($_POST['hidden_carid']);
$rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
$rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
$return_status = "NR"; // not returned
$fare = "NA";

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

$err_date = dateDiff("$rent_start_date", "$rent_end_date");

$sql0 = "SELECT * FROM cars WHERE car_id = '$car_id'";
$result0 = $conn->query($sql0);

if (mysqli_num_rows($result0) > 0) {
    while($row0 = mysqli_fetch_assoc($result0)) {

        if($type == "ac" && $charge_type == "km"){
            $fare = $row0["ac_price"];
        } else if ($type == "ac" && $charge_type == "days"){
            $fare = $row0["ac_price_per_day"];
        } else if ($type == "non_ac" && $charge_type == "km"){
            $fare = $row0["non_ac_price"];
        } else if ($type == "non_ac" && $charge_type == "days"){
            $fare = $row0["non_ac_price_per_day"];
        } else {
            $fare = "NA";
        }

        // Assign values to $car_name and $car_nameplate
        $car_name = $row0["car_name"];
        $car_nameplate = $row0["car_nameplate"];
        $client_username = $row0["client_username"]; // Assuming employee_id is stored in cars table
    }
}

if($err_date >= 0) { 
    $sql1 = "INSERT into booking(customer_username,car_id,booking_date,rent_start_date,rent_end_date,fare,charge_type,return_status) 
    VALUES('" . $customer_username . "','" . $car_id . "','" . date("Y-m-d") ."','" . $rent_start_date ."','" . $rent_end_date . "','" . $fare . "','" . $charge_type . "','" . $return_status . "')";
    $result1 = $conn->query($sql1);

    $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_id = '$car_id'";
    $result2 = $conn->query($sql2);

    if (!$result1 || !$result2){
        die("Could not complete booking: ".$conn->error);
    }

    // Get employee details from another table
    $sql3 = "SELECT * FROM users WHERE username = '$client_username'";
    $result3 = $conn->query($sql3);

    if (mysqli_num_rows($result3) > 0) {
        while($row3 = mysqli_fetch_assoc($result3)) {
            $client_username = $row3["username"];
            $client_phone = $row3["phone"];
        }
    } else {
        // If employee details not found, you can handle it here
        $client_username = "N/A";
        $client_phone = "N/A";
    }

    ?>

    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for using Car Rental System! We wish you have a safe ride. </h2>

    <div class="container">
        <h5 class="text-center">Please read the following information about your order.</h5>
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: orange;">Your booking has been received and placed into our order processing system.</h3>
                <br>
                <h4>Please make a note of your <strong>order number</strong> now and keep it in the event you need to communicate with us about your order.</h4>
                <br>
                <h3 style="color: orange;">Invoice</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_name; ?></h4>
                <br>
                <h4> <strong>Vehicle Number:</strong> <?php echo $car_nameplate; ?></h4>
                <br>

                <?php     
                if($charge_type == "days"){
                ?>
                    <h4> <strong>Fare:</strong> Rs. <?php echo $fare; ?>/day</h4>
                <?php } else {
                    ?>
                    <h4> <strong>Fare:</strong> Rs. <?php echo $fare; ?>/km</h4>

                <?php } ?>

                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Employee Name:</strong>  <?php echo $client_username; ?></h4>
                <br>
                <h4> <strong>Employee Contact: </strong> <?php echo $client_phone; ?></h4>
                <br>
            </div>
        </div>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            
        </div>
    </div>
</body>
</html>

<?php 
} else { 
    // If date difference is negative, show error
    ?>
    <div class="container">
        <div class="jumbotron" style="text-align: center;">
            You have selected an incorrect date.
            <br><br>
        </div>
    </div>
<?php } ?>
