<?php 
if (isset($_POST['deleteTranslation'])) {
    delTranslationInfo($_POST['deleteTranslation']);
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
$translationId = $_POST['id'];
$english = $_POST['english'];
$malay = $_POST['malay'];
$message = "Translation updated successfully";

// Update place data in the database
$sql = "UPDATE translation SET english ='$english', malay='$malay' WHERE id='$translationId'";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('$message');
    window.location.href='translationadmin.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();
?>

<?php 
function delTranslationInfo(){

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "visitjaybeee";

$message = "Translation deleted successfully";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

$id = $_POST['idToDelete'];
$sql = "DELETE FROM translation WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        $sql2 = "DELETE FROM translation WHERE id='$id'";
        if ($conn->query($sql2) === TRUE) {
            echo "<script>alert('$message');
            window.location.href='translationadmin.php';
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