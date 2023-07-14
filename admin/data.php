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
$imageUrl = $_POST['imageUrl'];
$name = $_POST['name'];
$category = $_POST['category'];
$link = $_POST['link'];
$message = "New place added successfully";

// Insert new place data into the database
$sql = "INSERT INTO places (image, name, category, link) VALUES ('$imageUrl', '$name', '$category', '$link')";
if ($conn->query($sql) === TRUE) {
    // echo '<script>alert("New place added successfully")</script>';
    // //header("Location: galleryadmin.html");
    echo "<script>alert('$message');
 window.location.href='galleryadmin.php '
 </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>