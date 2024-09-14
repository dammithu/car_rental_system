<?php
session_start();
$error='';

if (isset($_POST['submit'])) {

    if (empty($_POST['admin_username']) || empty($_POST['admin_password'])) {
        $error = "Username or Password is invalid";
    } else {
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];

        require 'connection.php';
        $conn = Connect();

        // Prepare the SQL query to fetch user details based on username and password
        $query = "SELECT username, password, role FROM users WHERE username=? AND password=? AND role='admin' LIMIT 1";

        // Prepare and execute the statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $admin_username, $admin_password);
        $stmt->execute();
        $stmt->bind_result($username, $password, $role);

        // Fetch the result
        if ($stmt->fetch()) {
            // Valid admin user
            $_SESSION['login_admin'] = $username;
            header("location: index.php");
            exit();
        } else {
            // Invalid admin user
            $error = "Username or Password is invalid";
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>
