<?php
session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  $uid = $_SESSION['id'];
} else {
  $uid = '';
}

if (isset($_POST['name']) && isset($_POST['image'])) {
  $name = $_POST['name'];
  $image = $_POST['image'];
  $caption = $_POST['caption'];
  $message = "New place added successfully";

  // Connect to your database
  $sname = "localhost";
  $unmae = "root";
  $password = "";
  $db_name = "visitjaybeee";
  $conn = mysqli_connect($sname, $unmae, $password, $db_name);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Save the post to the database
  $sql = "INSERT INTO transportation (name, image, caption) VALUES ('$name', '$image', '$caption')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
    window.location.href='transportationadmin.php '
    </script>";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

  $conn->close();
}