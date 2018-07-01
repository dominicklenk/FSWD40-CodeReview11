<?php
ob_start();
session_start(); // start a new session or continues the previous
if(isset($_SESSION['user'])!="" ){
header("Location: home.php"); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection

 $first = trim($_POST['first']);
 $first = strip_tags($first);
 $first = htmlspecialchars($first);

 $last = trim($_POST['last']);
 $last = strip_tags($last);
 $last = htmlspecialchars($last);

 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);


  // basic name validation

 if (empty($first)) {
      $error = true;
      $firstError = "Please enter your full firstname.";
 } else if (strlen($first) < 3) {
      $error = true;
      $firstError = "The first name must have minimum 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$first)) {
      $error = true;
      $firstError = "Firstname must contain letters and space.";
 }

 if (empty($last)) {
      $error = true;
      $lastError = "Please enter your full lastname.";
 } else if (strlen($last) < 3) {
      $error = true;
      $lastError = "The lastname must have minimum 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$last)) {
      $error = true;
      $lastError = "Lastname must contain letters and space.";
 }

 if (empty($name)) {
      $error = true;
      $nameError = "Please enter your username.";
 } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "The username must have minimum 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $nameError = "Try it again!";
 }


  //basic email validation

if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
  } else {

  // check whether the email exist or not
  $query = "SELECT email FROM user WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);

  if($count!=0){
      $error = true;
      $emailError = "The provided e-mail is already in use.";
  }
 }


  // password validation

if (empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
  } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have minimum 6 characters.";
 }

  // password hashing for security
  $password = hash('sha256', $pass);



  // if there is no error, continue to signup
if(!$error) {
  $query = "INSERT INTO user(first_name,last_name,user_name,email,password) VALUES('$first','$last','$name','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   
   unset($first);
   unset($last);
   unset($name);
   unset($email);
   unset($pass);


    } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";

      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylemylog.css">
</head>
<body class="text-center">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<h1 class = "mb-4 font-weight-bold welcome">Sign Up.</h1>
          
           <?php
  if ( isset($errMSG) ) {
  
   ?>
<div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
</div>
<?php
  }
  ?>

<!-- begin of form -->
<input type="text" name="first" class="form-control" placeholder="Enter your first name" maxlength="50" value="<?php echo $first ?>" />
<span class="text-danger"><?php echo $firstError; ?></span>
<input type="text" name="last" class="form-control" placeholder="Enter your last name" maxlength="50" value="<?php echo $last ?>" />
<span class="text-danger"><?php echo $lastError; ?></span>
<input type="text" name="name" class="form-control" placeholder="Enter your username" maxlength="50" value="<?php echo $name ?>" />

<span class="text-danger"><?php echo $nameError; ?></span>
<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
<span class="text-danger"><?php echo $emailError; ?></span>
<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
<span class="text-danger"><?php echo $passError; ?></span>
<hr />
<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
<hr />
        <a href="index.php">Log in Here...</a>
</form>
<!-- end of form -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>