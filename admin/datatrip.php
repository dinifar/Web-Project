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
$image = $_POST['image'];
$package = $_POST['package'];
$price = $_POST['price'];
$price = $_POST['price'];
$planning = $_POST['planning'];
$message = "New trip planning added successfully";

// Insert new trip data into the database
$sql = "INSERT INTO trip (image, package, price, planning) VALUES ('$image', '$package', '$price', '$planning')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
 window.location.href='tripadmin.php '
 </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>