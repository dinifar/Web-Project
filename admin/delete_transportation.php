<?php 
    $sname= "localhost";
    $unmae= "root";
    $password = "";
    $db_name = "visitjaybeee";

    $message = "Transportation deleted successfully";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

    $id = $_POST['idToDelete'];
    $sql = "DELETE FROM transportation WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "DELETE FROM transportation WHERE id='$id'";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('$message');
                window.location.href='transportationadmin.php';
                </script>";
            } else {
                echo "error sql2";
            }
        } else {
            echo "error sql";
        }
    }

?>