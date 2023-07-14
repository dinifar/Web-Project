<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "visitjaybeee";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $transportationId = $_POST['id'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $caption = $_POST['caption'];
    $message = "Transportation updated successfully";

    $sql = "UPDATE transportation SET image='$image', name='$name', caption='$caption' WHERE id='$transportationId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('$message'); window.location.href='transportationadmin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>

<?php 