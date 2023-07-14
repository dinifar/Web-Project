<!DOCTYPE html>
<html>
<head>
  <style>
    /* Add your CSS styles here */
  </style>
</head>
<body>

  <div id="placeList">
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

      // Fetch places data from the database
      $sql = "SELECT * FROM places";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $placeId = $row['id'];
            $imageUrl = $row['image'];
            $name = $row['name'];
            $category = $row['category'];
             

              echo '
              <div class="place">
              
                 <a <img class="place-image" src="' . $imageUrl. '" alt="' . $name . '">
                  <div style="font-size: 150%;">' . $name . '</div>
                  <div>' . $category . '</div>
                </a>
              </div>';
          }
      }

      $conn->close();
    ?>
  </div>

  <form method="POST" action="data.php">
    <h2>Add New Place</h2>
    <label for="image">Image URL:</label>
    <input type="file" name="imageUrl" required>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="category">Category:</label>
    <input type="text" name="category" required>
    <button type="submit">Add Place</button>
  </form>
</body>
</html>
