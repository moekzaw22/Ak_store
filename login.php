<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$alert_message = '';
$valid_password = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["txtpassword"];
    
    // Validate credentials
    if ($password === $valid_password) {
        $valid_username = "admin";
        $_SESSION['Username'] = $valid_username;
        $alert_message = 'Login Success.';
        header("Location: Today_Sale_List.php");
        exit();
    } else {
        $alert_message = 'Invalid credentials. Please try again.';
        header("Location: login.html"); // Redirect to login page on failure
        exit(); // Ensure script execution stops after redirection
    }
}
?>
