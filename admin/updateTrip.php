<?php 
if (isset($_POST['deleteTrip'])) {
    delTrip();
}

?>

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
$tripId = $_POST['id'];
$image = $_POST['image'];
$package = $_POST['package'];
$price = $_POST['price'];
$planning = $_POST['planning'];
$message = "Trip Planning updated successfully";

// Update place data in the database
$sql = "UPDATE trip SET image='$image', package='$package', price='$price', planning='$planning' WHERE id='$tripId'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
    window.location.href='tripadmin.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();
?>

<?php 


function delTrip(){

    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "visitjaybeee";

    $message = "Trip Planning deleted successfully";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

    $id = $_POST['idToDelete'];
    $sql = "DELETE FROM trip WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "DELETE FROM places WHERE id='$id'";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('$message');
                window.location.href='tripadmin.php';
                </script>";
            } else {
                echo "error sql2";
            }
        } else {
            echo "error sql";
        }
    }
}

?>