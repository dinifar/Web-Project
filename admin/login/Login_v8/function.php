<?php
// Start the session
session_start();

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "visitjaybeee";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$username = $_POST["username"];
$password = $_POST["password"];

// Secure the input data
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Check if the username and password match
$sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Login successful, set session variables
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['user_name'];
    $_SESSION['id'] = $row['id'];

    // Check the user type
    if ($row['type'] == 0) {
        ob_start();
        // User is an admin, redirect to indexadmin.php
        header("Location: ..\..\..\admin\indexadmin.php");
        ob_end_flush();
        exit();
    } elseif ($row['type'] == 1) {
        ob_start();
        // User is a superadmin, redirect to admin.php
        header("Location: ..\..\adminpage\admin.php");
        ob_end_flush();
        exit();
    }
} else {
    // Login failed, display error message
    $_SESSION['login_error'] = true;
    ob_start();
    header("Location: login.php");
    ob_end_flush();
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
