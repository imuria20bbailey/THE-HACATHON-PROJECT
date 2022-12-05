<?php

// include Function  file
include_once('../setup/function.php');

// Object creation
$userdata=new DB_con();

if(isset($_POST['btn-register']))
{

// Posted Values
$name= ucwords(mysqli_real_escape_string($db, $_POST['name']));
$email= strtolower(mysqli_real_escape_string($db, $_POST['email']));
$uname= strtolower(mysqli_real_escape_string($db, $_POST['username']));
$pasword=md5(sha1(mysqli_real_escape_string($db, $_POST['password']), PASSWORD_DEFAULT));
$cpasword=md5(sha1(mysqli_real_escape_string($db, $_POST['confirm_password']), PASSWORD_DEFAULT));

if($pasword != $cpasword)
{
  echo "<script>alert('Sorry! Password does not match.');</script>";
}
else
{
//Function Calling
$sql=$userdata->registration($name, $email, $uname, $pasword);

if($sql)
{
// Message for successfull insertion
echo "<script>alert('Registration was successfull.');</script>";
echo "<script>window.location.href='../index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='../index.php'</script>";
}
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logos/logo.png">
  <link rel="icon" type="image/png" href="../assets/img/logos/logo.png">
  <title>Ebola Portal - Register page</title>

  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signin.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              
        
            
            <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">REGISTRATION PAGE</h4>
                  <p class="mb-0">Fill in your details below to register</p>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form-register" id="form-register" role="form">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="name" id="name" placeholder="Full name" required class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="email" name="email" id="email" placeholder="Email address" required class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="username" id="username" placeholder="Username" required class="form-control" onblur="checkusername(this.value)" class="input-xlarge">
                      <span id="usernameavailblty"></span>
                  </div>
                    <div class="input-group input-group-outline mb-3">                      
                      <input type="password" name="password" id="password" placeholder="Password" required class="form-control">
                  </div>
                    <div class="input-group input-group-outline mb-3">                      
                      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required class="form-control" >
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="#" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="btn-register" id="btn-register" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Create</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="../index.php" class="text-primary text-gradient font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script>
      function checkusername(va) {
        $.ajax({
        type: "POST",
        url: "../setup/check_account.php",
        data:'username='+va,
        success: function(data){
        $("#usernameavailblty").html(data);
        }
        });
      
      }
</script>
   <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
   
</body>

</html>