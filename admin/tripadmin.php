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
  
  if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

      $uid = $_SESSION['id'];

  }else{
      $uid = '';
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trip Planning</title>
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
	          <li class="nav-item"><a href="transportationadmin.php" class="nav-link">Transport and Routes</a></li>
	          <li class="nav-item active"><a href="tripadmin.php" class="nav-link">Trip Planning</a></li>
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
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Trip Planning <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Trip Planning</h1>
          </div>
        </div>
      </div>
    </section>

    <head>
    <style>
      /* Add some basic styling */
      .planning {
        display: inline-block;
        margin: 10px;
        text-align: center;
      }
       .place-images {
        max-width: 370px;
      } 
    </style>
  </head>

    <section class="ftco-section bg-light">
    	
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>AFFORDABLE BUDGET</h2>
          </div>
        </div>

		<div class="wrapper">
    	<div id="search-container">
      	<div style = "text-align: center;">

    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Add New Trip Planning Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Trip Planning</h5>
                
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
              <form method="POST" action="datatrip.php">
              
              <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" name="image" required> </div>

              <div class="form-group">
              <label for="name">Package:</label>
              <input type="text" name="package" required></div>

              <div class="form-group">
              <label for="name">Price:</label>
              <input type="text" name="price" required></div>

              <div class="form-group">
              <label for="image">Planning:</label>
              <input type="file" name="planning" required> </div>

              <div class="form-group">

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="Save Changes">Add Trip Planning</button>
              </div>
            </div>
          </div>
        </div>

    </div>
    </div>
 

<br>
    
  <div id="tripList">

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

  // Fetch places data from the database
  $sql = "SELECT * FROM trip ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tripId = $row['id'];
        $image = $row['image'];
        $package = $row['package'];
        $price = $row['price'];
        $planning = $row['planning'];
        
        echo '
      <div class="planning block-7">
			<div class="image-container">
      <div align="center" >
		
			<img class="place-images" src="../images/'.$image.'" ></a>
			<div class="text-center p-4">
            <span class="excerpt d-block">' . $package . '</span>
            <input type="hidden" name="idtodelete" 
            value="' . $tripId. '" ></div>
			<span class="price"><sup>RM</sup> <span class="number">' . $price . '</span> <sub>/per person</sub></span>

				<ul class="pricing-text mb-5">
					<li><span class="fa fa-check mr-2"></span>Food Recommended</li>
					<li><span class="fa fa-check mr-2"></span>Recommended Places</li>
				
			<a href="../images/'.$planning.'" class="icon image-popup d-flex justify-content-center align-items-center btn btn-primary d-block px-2 py-3">Trip Planning</a>
			<br>
			<form action="updateTrip.php" method="POST">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter' . $tripId . '">
            <i class="fa fa-edit"></i>  </button>
            <input type="hidden" name="idToDelete" 
            value="' . $tripId. '" >
            <button type="submit" class="btn btn-danger" name="deleteTrip" id="deleteTrip" value="Delete"><i class="fa fa-trash-o"></i></button>
            </form>

			</div>
			</div>
			
            
        </div>';


      // Update form using modal
      
       echo' <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter' . $tripId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Trip Planning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="updateTrip.php">
              <input type="hidden" name="id" value="' . $tripId . '">

              <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" name="image" required value="'.$image.'">
              </div>

              <div class="form-group">
              <label for="name">Package:</label>
              <input type="text" name="package" value="' . $package . '"><br>
              </div>

              <div class="form-group">
              <label for="name">Price:</label>
              <input type="text" name="price" value="' . $price . '"><br>
              </div>

              <div class="form-group">
              <label for="image">Planning:</label>
              <input type="file" name="planning" value="' . $planning . '"><br>
              </div>
              
              </div>
              <div class="modal-footer" align="center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save Changes"></button>
              </div>
              </form>
            </div>
          </div>
        </div>';
    }
}

$conn->close();
?>

    </section>

    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Trip Planning</h2>
						<p>Travel opens your heart, broadens your mind, and fills your life with stories to tell.”</p>
					</div>
				
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
						<li><a href="indexadmin.php" class="py-2 d-block">Home</a></li>
						<li><a href="aboutadmin.php" class="py-2 d-block">About</a></li>
						<li><a href="galleryadmin.php" class="py-2 d-block">Places</a></li>
						<li><a href="translationadmin.php" class="py-2 d-block">Translation</a></li>
						<li><a href="transportationadmin.php" class="py-2 d-block">Transportation</a></li>
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


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


    
  </body>
</html>