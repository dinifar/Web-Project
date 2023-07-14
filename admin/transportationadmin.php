<?php
session_start();

  function getUserType() {
    $dbHost = 'localhost'; 
    $dbUser = 'root'; 
    $dbPass = ''; 
    $dbName = 'visitjaybeee'; 

    
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $uid = $_SESSION['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT type FROM users WHERE id = '$uid'";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    // Fetch the user type from the result
    $row = mysqli_fetch_assoc($result);
	if ($row !== null) {
        $userType = $row['type'];
    } else {
        // Set a default user type if the row is null
        $userType = '0'; // Change this to the desired default user type value
    }
    mysqli_close($conn);
    
    return $userType;
}

$userType = getUserType();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  $uid = $_SESSION['id'];
} else {
  $uid = '';
}

// Connect to your database
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "visitjaybeee";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Fetch transportation data from the database
$sql = "SELECT * FROM transportation";
$result = $conn->query($sql);

?>

<?php
function getLimitedCaption($caption, $limit = 10) {
  $words = explode(" ", $caption);
  if (count($words) > $limit) {
    $caption = implode(" ", array_slice($words, 0, $limit)) . "...";
  }
  return $caption;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transportation - Visit Jaybee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/logo.png" type="image/ico">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="" scrset=""></span>&nbsp;&nbsp;Visit Jaybee</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="indexadmin.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="aboutadmin.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="galleryadmin.php" class="nav-link">Places</a></li>
          <li class="nav-item"><a href="translationadmin.php" class="nav-link">Translation Services</a></li>
          <li class="nav-item active"><a href="transportationadmin.php" class="nav-link">Transport and Routes</a></li>
          <li class="nav-item"><a href="tripadmin.php" class="nav-link">Trip Planning</a></li>
        </ul>
        <?php if (!empty($uid)) {
    ?>
    <a href="logout.php" class="btn btn-primary mr-md-4 py-3 px-4">Logout<span class="ion-ios-arrow-forward"></span></a>
    <?php
    if ($userType === "1") {
        ?>
        <a href="adminpage/admin.php" class="btn btn-primary mr-md-4 py-3 px-4">Admin<span class="ion-ios-arrow-forward"></span></a>
        <?php
    }
} else {
    ?>
    <a href="login\Login_v8\login.php" class="btn btn-primary mr-md-4 py-3 px-4">Login<span class="ion-ios-arrow-forward"></span></a>
    <?php
}
?>
      </div>
    </div>
  </nav>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <h1 class="mb-3 bread">Transport and Routes</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
    <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Add New Transport</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Transport</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
  <br>
      <div class="row d-flex">
      <?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="col-md-4 d-flex ftco-animate">';
    echo '<div class="blog-entry justify-content-end">';
    echo '<img class="block-20" src="../transportationimages/' . $row['image'] . '" alt="Transportation">';
    echo '<div class="text p-4 float-right d-block">';
    echo '<div class="topper d-flex align-items-center">';
    echo '<div class="one py-2 pl-3 pr-1 align-self-stretch">';
    echo '</div>';
    echo '<div class="two pl-0 pr-3 py-2 align-self-stretch">';
    echo '</div>';
    echo '</div>';
    echo '<h3 class="heading mb-3">' . $row['name'] . '</h3>';
    echo '<h4 class="heading mb-3">' . getLimitedCaption($row['caption'], 10) . '</h4>';
    echo '<p><a href="transportation_details.php?id=' . $row['id'] . '">Read more</a></p>';
    echo '<p>';

    // Start of the form
    echo '<form action="delete_transportation.php" method="post">';
    echo '<input type="hidden" name="idToDelete" value="' . $row['id']. '">';

    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'. $row['id'] .'"><i class="fa fa-edit"></i></button>';
    echo '&nbsp;&nbsp;';
    echo '<button type="submit" class="btn btn-danger" name="deleteTransportation" id="deleteTransportation" value="Delete"><i class="fa fa-trash-o"></i></button>';

    // End of the form
    echo '</form>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo '<div class="col-md-12 d-flex ftco-animate">';
  echo '<div class="blog-entry justify-content-end">';
  echo '<div class="text p-4 float-right d-block">';
  echo '<h3 class="heading mb-3">No posts found.</h3>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
?>

      </div>
    </div>
  </section>



  <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Visit Johor Bahru</h2>
						<p>Johor Bahru is the city and the state capital of Johor in Malaysia. This city is surrounded by suburbs, industrial parks, and extended waterfront areas in the southern part of Peninsular Malaysia.</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="indexadmin.php" class="py-2 d-block">Home</a></li>
              <li><a href="aboutadmin.php" class="py-2 d-block">About</a></li>
              <li><a href="galleryadmin.php" class="py-2 d-block">Places</a></li>
              <li><a href="translation.php" class="py-2 d-block">Translation</a></li>
              <li><a href="transportation.php" class="py-2 d-block">Transportation</a></li>
			        <li><a href="tripadmin.php" class="py-2 d-block">Trip</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">Section of Corporate Affairs, Sultan Ibrahim Chancellery Building, Universiti Teknologi Malaysia, 81310 Johor Bahru, Johor, Malaysia.</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+6 07-553 3333</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">corporate@utm.my</span></a></li>
              </ul>
            </div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-12 text-center">

            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
			</div>
		</footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  </body>
</html>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Transport</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  <form method="post" action="save_post.php">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="caption">Caption</label>
      <textarea class="form-control" id="caption" name="caption" rows="20" required></textarea>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" name="image" required value="'.$image.'">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
      </div>
    </div>
  </div>

  <?php
// Connect to your database
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "visitjaybeee";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch places data from the database
$sql = "SELECT * FROM transportation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        $transportationId = $row['id'];
        $image = $row['image'];
        $name = $row['name'];
        $caption = $row['caption'];
        $message = "Transportation updated successfully";

        echo '<div class="modal fade" id="exampleModalCenter' . $transportationId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle' . $transportationId . '">Update Transport</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="update_post.php">
                            <input type="hidden" name="id" value="' . $transportationId . '">
                           
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" required value="' . $name . '">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption:</label>
                                <textarea class="form-control" id="caption" name="caption" rows="20" required>' . $caption . '</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image URL:</label>
                                <input type="file" name="image" required value="' . $image . '">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }
} 
$conn->close();
?>


</div>
      </div>
    </div>
  </div>