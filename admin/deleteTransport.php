<?php 
if(isset($_GET['id'])) {
    // Get the ID from the URL
    $transportationId = $_GET['id'];

    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "visitjaybeee";
    $message = "Transportation Deleted successfully";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

        $sql = "DELETE FROM transportation WHERE id = $transportationId";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('$message');
            window.location.href='transportationadmin.php';
        </script>";
        } else {
            echo "Error deleting transportation record: " . $conn->error;
        }
    
        // Close the connection
        $conn->close();
}
}

?>