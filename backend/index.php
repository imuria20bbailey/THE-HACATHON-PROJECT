<?php

session_start();

// include Function  file
include_once('setup/function.php');

// Object creation
$usercredentials=new DB_con();


if(isset($_POST['btn-login']))
{
// Posted Values
$username    = $_POST['username'];
echo $password  = md5(sha1($_POST['password'], PASSWORD_DEFAULT));

//Function Calling
$ret=$usercredentials->signin($username,$password);
$num=mysqli_fetch_array($ret);

if($num>0)
{
  $_SESSION['uid']=$num['user_id'];
  $_SESSION['fname']=$num['username'];

  // For success
echo "<script>window.location.href='pages/dashboard.php'</script>";
}
else
{
// Message for unsuccessfull login
echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logos/logo.png">
  <link rel="icon" type="image/png" href="assets/img/logos/logo.png">
  <title>Ebola Portal - Login page</title>

  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">


  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">LOGIN PAGE</h4>
                  <div class="row mt-3">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
              <?php //echo $password  = md5(sha1('123456', PASSWORD_DEFAULT));?> 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form-login" id="form-login" role="form" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <!--<label class="form-label">Username</label>-->
                    <input type="text" name="username" id="username" placeholder="Username" required class="form-control" >
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Password</label> -->
                    <input type="password" name="password" id="password" placeholder="Password" required class="form-control" >
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div> 
                  <div class="text-center">
                    <button type="submit" name="btn-login" id="btn-login" class="btn bg-gradient-primary w-100 my-4 mb-2">
                     Login</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="pages/register.php" class="text-primary text-gradient font-weight-bold">
                        Create</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer starts-->
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-12 my-auto" >
                    <div style="" class="copyright text-center text-sm text-white">
                        Copyright © 
                        <script>
                        document.write(new Date().getFullYear())
                        </script>
                        Ebola portal
                        <a href="https://www.health.go.ug" class="font-weight-bold text-info" target="new">Ministry of Health Uganda</a>.
                        All rights reserved.
                    </div>
                </div>                
            </div>
        </div>
      </footer> 
      <!--footer ends -->

    </div>
    
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>

  <script>

  </script>
  
</body>

</html>