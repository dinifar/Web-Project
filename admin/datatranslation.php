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
$english = $_POST['english'];
$malay = $_POST['malay'];
$message = "New translation added successfully";

// Insert new trip data into the database
$sql = "INSERT INTO translation (english, malay) VALUES ('$english', '$malay')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
 window.location.href='translationadmin.php '
 </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>