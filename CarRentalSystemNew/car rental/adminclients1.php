<!DOCTYPE html>
<html>
<?php 
session_start();
require 'connection.php';
$conn = Connect();
// Assuming your SQL query is something like this
$query = "SELECT * FROM users WHERE role = 'client'";
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


    <title>Clients</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">CLIENTS DETAILES</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td bgcolor="black">Client username</td>
                                <td bgcolor="black">Client name</td>
                                <td bgcolor="black">Client phone</td>
                                <td bgcolor="black">Client email</td>
                                <td bgcolor="black">Client address</td>
                                <td bgcolor="black">Edit</td>
                                <td bgcolor="black">Delete</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><a href="adminedit.php?username=<?php echo $row['username']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="deleteclient.php?username=<?php echo $row['username']; ?>" class="btn btn-danger">Delete</a></td>
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