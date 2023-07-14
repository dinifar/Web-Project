<?php

include_once '../../include/db_connect.php';

session_start();


if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    $uid = $_SESSION['id'];

}else{
    $uid = '';
}


$updateCheck = "";


// if (isset($_SESSION['users'])) {
//   //header("Location: ..admin dashboard/index.php");
// }

if (!isset($_SESSION['id'])) {
    header('Location: ../login/Login_v8/login.php');
}else{

    $sql = "select * from users WHERE id = '$uid' ";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_assoc($result);

    $fname = $row['name'];
    $uname = $row['user_name'];
    $mobile = $row['phoneNum'];

}

if(isset($_POST['update'])){

    $nameUp = $_POST['Name'];
    $passwordUp = $_POST['password'];
    $conpasswordUp = $_POST['password2'];
    $PhoneNumUp = $_POST['PhoneNum'];


    $sqlUp = "Update users SET name = '$nameUp', phoneNum = '$PhoneNumUp' ";

    if(!empty($passwordUp)){
        if($passwordUp != $conpasswordUp){
            echo "<script>alert('Password Not Matched!');</script>";
            echo "<script>window.location.href = 'profile.php';</script>";
        }else{
            $sqlUp .= ", password = '$passwordUp'";
        }
    }

    $sqlUp .= " WHERE id = '$uid'";

    $resultUp = mysqli_query($GLOBALS['con'], $sqlUp);
    if($resultUp){
        // $updateCheck = "success";
        echo "<script>alert('Update Info Successfully');</script>";
        echo "<script>window.location.href = 'profile.php';</script>";
    }else{
        // $updateCheck = "error";
        echo "<script>alert('Update Info Failed');</script>";
        echo "<script>window.location.href = 'profile.php';</script>";
    }

}

// if (isset($_GET['id'])) {
//   $id = $_GET['id'];
//   $_SESSION['EditprofileID'] = $id;
//   if($con) {
//     echo mysqli_error($GLOBALS['con']);
//   } else {
//     $sql = "select * from users WHERE id = '$id'";
//     $qry = mysqli_query($con, $sql);
//     $userRecord = mysqli_fetch_assoc($qry);
//     $name = $userRecord['Name'];
//     $user_name = $userRecord['user_Name'];
//     $phoneNum = $userRecord['PhoneNum'];

//   }
// }


// if (isset($_POST['cancel'])) {
//   header('Location: profile.php');
//   exit();
// } else if (isset($_POST['update'])) {
//   EditProfile();
// }

// if (isset($_GET['update'])) {
//   $updateCheck = $_GET['update'];
// }



// if (isset($_GET['id'])) {
//   $id = $_GET['id'];
//   $_SESSION['EditprofileID'] = $id;
  
//   if (!$GLOBALS['con']) {
//     echo mysqli_error($GLOBALS['con']);
//   } else {
//     $sql = "SELECT * FROM users WHERE id = '$id'";
//     $qry = mysqli_query($GLOBALS['con'], $sql);
    
//     if ($qry) {
//       $userRecord = mysqli_fetch_assoc($qry);
//       $name = $userRecord['Name'];
//       $user_name = $userRecord['user_Name'];
//       var_dump($user_name);
//       $phoneNum = $userRecord['PhoneNum'];
//     } else {
//       echo mysqli_error($GLOBALS['con']);
//     }
//   }
// }



//   session_start();
//   if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

//       $uid = $_SESSION['id'];

//   }else{
//       $uid = '';
//   }


?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../images/logo.png" type="image/ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body>

<?php
  if (isset($updateCheck)) {
    if ($updateCheck == "success") {
      echo "<script type='text/javascript'>
              Swal.fire(
                'Updated!',
                'Admin has been updated!',
                'success'
              )
            </script>";
    }else{
        echo "<script type='text/javascript'>
              Swal.fire(
                'Failed!',
                'Admin failed to updated!',
                'error'
              )
            </script>";
    }
  }
  ?>

<div class="bg04">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="admin.php">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../indexadmin.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">ADMIN</a>
                            </li>
                            <div class="nav-item">
                                <a class="nav-link" href="profile.php">PROFILE</a>
                                
                            </div>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="../login\Login_v8\login.php">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        
        <div class="row tm-content-row tm-mt-big">
           
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-black tm-block h-100">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Profile Account</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-7 col-12">
                            <form action="" class="tm-editadmin-form" method="POST" enctype="multipart/form-data" autocomplete="off">


                                <div class="form-group">
                                    <label for="name1">Account Name</label>
                                    <input placeholder="Full Name" id="name1" name='Name' type="text" class="form-control" value="<?php echo $fname; ?>" required>
                                </div> 

                                <div class="form-group">
                                    <label for="username1">Account Email (Non Editable)</label>
                                    <input placeholder="Email address" id="username1" name='user_Name' type="email" class="form-control" value="<?php echo $uname; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password (Optional)</label>
                                    <input placeholder="******" id="password" name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Re-enter Password</label>
                                    <input placeholder="******" id="password2" name="password2" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNum1">Phone</label>
                                    <input placeholder="No-Phone" id="phoneNum1" name='PhoneNum' type="tel" class="form-control " value="<?php echo $mobile; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" name="update" Value="Submmit" id ="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                    
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
     

        

        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018. Created by
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>

