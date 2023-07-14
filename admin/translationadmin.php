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
    <title>Translation Services</title>
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
    <link rel="stylesheet" href="css/translation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

	<link rel="icon" href="images/logo.png" type="image/ico">
	
  </head>
  <body>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="" scrset=""></span>&nbsp;&nbsp;Visit Jaybee</a>
			<!--button ni aku comment dulu sbb baru boleh function-->
			<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button> --> 
	      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="indexadmin.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="aboutadmin.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="galleryadmin.php" class="nav-link">Places</a></li>
	        	<li class="nav-item active"><a href="translationadmin.php" class="nav-link">Translation Services</a></li>
	          <li class="nav-item"><a href="transportationadmin.php" class="nav-link">Transport and Routes</a></li>
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
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/img_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Translation <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Translation Services</h1>
          </div>
        </div>
      </div>
    </section>

<br> <br>
			
		
			<div class="wrapper">
			<div id="search-container">
			<div style = "text-align: center;">

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
			Add New Translation
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add New Translation</h5>
					
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				
				<form method="POST" action="datatranslation.php">

				<div class="form-group">
				<label for="name">English:</label>
				<input type="text" name="english" required></div>

				<div class="form-group">
				<label for="name">Malay:</label>
				<input type="text" name="malay" required></div>

				<div class="form-group">

				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" value="Save Changes">Add Translation</button>
				</div>
				</div>
			</div>
			</div>

		</div>
		</div>


		<br>
		<div class="container">
		<div class="row justify-content-center">
		<table>
			<tr>
			<th>English</th>
			<th>Malay</th>
			<th>Action</th>
			</tr>
		

		<tbody>
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
		$sql = "SELECT * FROM translation ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$translationId = $row['id'];
			$english = $row['english'];
			$malay = $row['malay'];
			
			echo '

			<div class="container">
			<div class="row justify-content-center">
			
			
				<tr>
				<td>' . $english . '</td>
				<td>' . $malay . '</td>
				<form action="updateTranslation.php" method="POST">
				<td> 
				<input type="button" class="btn btn-info" value="Edit" data-toggle="modal" data-target="#exampleModalCenter' . $translationId . '">
				  
				<input type="hidden" name="idToDelete" value="' . $translationId. '">
				<input type="submit" class="btn btn-danger" name="deleteTranslation" id="deleteTranslation" value="Delete"><i class="fa fa-trash-o"></i>
				</form>
				</td>
				</tr>

			
				</div>
				
			</div>';

			echo' <!-- Modal -->
			<div class="modal fade" id="exampleModalCenter' . $translationId . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Update Translation Details</h5>
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
				  <form method="POST" action="updateTranslation.php">
				  <input type="hidden" name="id" value="' . $translationId . '" >
	
				  <div class="form-group">
				  <label for="english">English:</label>
				  <input type="text" name="english" value="' .$english.'" ><br>
				  </div>
	
				  <div class="form-group">
				  <label for="malay">Malay:</label>
				  <input type="text" name="malay" value="' .$malay.'" ><br>
				  </div>
				  
				  </div>
				  <div class="modal-footer" align="center">
					<input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close"></button>
					<input type="submit" class="btn btn-primary" value="Save Changes" id="updateTranslation"></button>
				  </div>
				  </form>
				</div>
			  </div>
			</div>';


			

		}
		}

		$conn->close();
		?>
		</tbody>
		</table>
	</div></div>
<br>

<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 heading-section text-center ftco-animate">
						<h2 >Basic Translation</h2>
					</div>
				</div>
					
					<div class="col-md-12">
						<div class="wrapper">
							<br>
							<div class="dbox w-100 text-center">
								<div class="text-input">
								  <textarea spellcheck="false" class="from-text" placeholder="Enter text"></textarea>
								  <textarea spellcheck="false" readonly disabled class="to-text" placeholder="Translation"></textarea>
								</div>
								<ul class="controls">
								  <li class="row from">
									<div class="icons">
									  <i id="from" class="fas fa-volume-up"></i>
									  <i id="from" class="fas fa-copy"></i>
									</div>
									<select></select>
								  </li>
								  <li class="exchange"><i class="fas fa-exchange-alt"></i></li>
								  <li class="row to">
									<select></select>
									<div class="icons">
									  <i id="to" class="fas fa-volume-up"></i>
									  <i id="to" class="fas fa-copy"></i>
									</div>
								  </li>
								</ul>
								<button id="buttonTranslate">Translate Text</button>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<br><br>

    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Translation Services</h2>
						<p>We offer reliable and accurate translation services in a variety of languages, ensuring that you can communicate effectively and easily with locals wherever you go. Our user-friendly interface and fast turnaround times make us the perfect solution 
							for all your translation needs on the go.</p>
						<!-- <ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul> -->
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
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
  <script src="js/main.js"></script>

  <script src="js/countries.js"></script>
  <script src="js/script.js"></script> 
  
  </body>
</html>