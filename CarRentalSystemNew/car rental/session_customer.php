<?php

require 'connection.php';
$conn = Connect();

session_start();


$user_check=$_SESSION['login_customer'];


$query = "SELECT username FROM users WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
?>