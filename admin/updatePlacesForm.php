<?php 
if (isset($_POST['deletePlaces'])) {
    delPlacesInfo($_POST['deletePlaces']);
}

?>

<?php
// Connect to your database
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "travel";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$placeId = $_POST['id'];
$image = $_POST['image'];
$name = $_POST['name'];
$category = $_POST['category'];
$message = "Place updated successfully";

// Update place data in the database
$sql = "UPDATE places SET image='$image', name='$name', category='$category',  WHERE id='$placeId'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
    window.location.href='galleryadmin.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();
?>

<?php 


function delPlacesInfo(){

    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "travel";

    $message = "Place deleted successfully";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

    $id = $_POST['idToDelete'];
    $sql = "DELETE FROM places WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "DELETE FROM places WHERE id='$id'";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('$message');
                window.location.href='galleryadmin.php';
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