<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Rental, CR11 - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-fixed navbar-expand-lg navbar-light bg-light">
  <a class="fas fa-car navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fab fa-opencart"></span>
  </button>
  <?php 
      if ($_SESSION['user'] == "2" ) {
      echo "<a class='form-inline' href='cars_per_location.php'>Admins Site</a>";
      } 
      ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    </ul>

    <!-- echo Hello to the user_name -->

    <li class="form-inline my-2 my-lg-0">
      <span class="mr-5">Hello <?php echo $userRow['user_name'] . "!"; ?></span>
      <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php?logout"><i class="fas fa-sign-out-alt">&nbsp;</i>Log Out</a>

  </div>
</nav>

<!-- begin for the content of the sites -->

<div class="container-fluid mt-4">