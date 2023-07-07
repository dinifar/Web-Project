<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Places Details In Johor Bahru</title>
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
    <link rel="stylesheet" href="css/search.min.css">

    <link rel="icon" href="images/logo.png" type="image/ico">
  </head>
  <body>

		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="" scrset=""></span>&nbsp;&nbsp;Visit Jaybee</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item  active"><a href="gallery.php" class="nav-link">Places</a></li>
	        	<li class="nav-item"><a href="translation.php" class="nav-link">Translation Services</a></li>
	          <li class="nav-item"><a href="transportation.php" class="nav-link">Transport and Routes</a></li>
	          <li class="nav-item"><a href="trip.php" class="nav-link">Trip Planning</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/sign.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Places Details</h1>
            <p>Click on the place picture to go to a new page and read more about that place</p>

          </div>
        </div>
      </div>
    </section>

    <head>
    <style>
      /* Add some basic styling */
      .place {
        display: inline-block;
        margin: 10px;
        text-align: center;
      }
      /* .place-image {
        max-width: 370px;
      } */
    </style>
  </head>

  
  <!-- <div class="wrapper"> -->
    <div id="search-container">
      <div style = "text-align: center;">

  <br>

    <input type="text" id="searchInput" placeholder="Search place name here...">
    <button onclick="search()">Search</button>
    
  <br><br>
  <button class="button-value" onclick="filterCategory('all')">All</button>
    <button class="button-value" onclick="filterCategory('Entertainment')">Entertainment</button>
    <button class="button-value" onclick="filterCategory('Shopping Place')">Shopping Place</button>
    <button class="button-value" onclick="filterCategory('Hangout Place')">Hangout Place</button>
    <button class="button-value" onclick="filterCategory('Unique Attraction')">Unique Attraction</button>
    <button class="button-value" onclick="filterCategory('Popular Eatery')">Popular Eatery</button>
    
  </div>
  

    
  <div id="placeList">

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
  $sql = "SELECT * FROM places";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $imageUrl = $row['image'];
          $name = $row['name'];
          $category = $row['category'];
          $link = $row['link'];

          echo '
          <div class="place">
            <a href="' . $link . '">
              <img class="place-image" src="images/'.$imageUrl.'" alt="' . $name . '"> </a>
              <div style="font-size: 150%;">' . $name . '</div>
              <div>' . $category . '</div>
          </div>';


      }
  }

  $conn->close();
?>

</div>

    <script>
      function search() {
        var input = document.getElementById('searchInput').value.toUpperCase();
        var placeList = document.getElementById('placeList');
        var places = placeList.getElementsByClassName('place');
  
        for (var i = 0; i < places.length; i++) {
          var place = places[i].getElementsByTagName('div')[0];
          var text = place.textContent || place.innerText;
          if (text.toUpperCase().indexOf(input) > -1) {
            places[i].style.display = 'inline-block';
          } else {
            places[i].style.display = 'none';
          }
        }
      }
  
      function filterCategory(category) {
        var placeList = document.getElementById('placeList');
        var places = placeList.getElementsByClassName('place');
  
        if (category === 'all') {
          for (var i = 0; i < places.length; i++) {
            places[i].style.display = 'inline-block';
          }
        } else {
          for (var i = 0; i < places.length; i++) {
            var placeCategory = places[i].getElementsByTagName('div')[1].textContent.trim();
            if (placeCategory === category) {
              places[i].style.display = 'inline-block';
            } else {
              places[i].style.display = 'none';
            }
          }
        }
      }
    </script>

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
              <li><a href="index.html" class="py-2 d-block">Home</a></li>
              <li><a href="about.html" class="py-2 d-block">About</a></li>
              <li><a href="gallery.php" class="py-2 d-block">Places</a></li>
              <li><a href="translation.php" class="py-2 d-block">Translation</a></li>
              <li><a href="transportation.php" class="py-2 d-block">Transportation</a></li>
			        <li><a href="trip.php" class="py-2 d-block">Trip</a></li>
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