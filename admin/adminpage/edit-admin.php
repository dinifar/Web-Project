<?php
// Connect to your database
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "visitjaybeee";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$profileId = $_POST['id'];
$name = $_POST['name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$phoneNum = $_POST['phoneNum'];
$message = "Profile updated successfully";

// Update place data in the database
$sql = "UPDATE users SET name='$name', user_name='$user_name', password='$password', phoneNum='$phoneNum' WHERE id='$profileId'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
    window.location.href='profile.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();
?>

