<?php
session_start();
$error='';

if (isset($_POST['submit'])) {
    if (empty($_POST['client_username']) || empty($_POST['client_password'])) {
        $error = "Username or Password is invalid";
    } else {
        $username = $_POST['client_username'];
        $password = $_POST['client_password'];

        require 'connection.php';
        $conn = Connect();

        // Modify the query to include the role condition
        $query = "SELECT username, password FROM users WHERE username=? AND password=? AND role='client' LIMIT 1";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();

        if ($stmt->fetch()) {
            $_SESSION['login_client'] = $username;
            header("location: index.php");
        } else {
            $error = "Username or Password is invalid";
        }

        mysqli_close($conn);
    }
}
?>
