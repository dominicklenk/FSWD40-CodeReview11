<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Rental, CR11 - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="fas fa-car navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fab fa-opencart"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Choose Here!
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="office_list.php">choose your office</a>
          <a class="dropdown-item" href="cars_list.php">choose your car</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cars_locations.php">go to your favourite location</a>
        </div>
      </li>
    </ul>

    <!-- echo Hello to the user_name -->

    <li class="form-inline my-2 my-lg-0">
      <span class="mr-5">Hello <?php echo $userRow['user_name']; ?></span>
      <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php?logout"><i class="fas fa-sign-out-alt">&nbsp;</i>Log Out</a>
    </ul>
  </div>
</nav>

<!-- begin for the content of the sites -->

<div class="container-fluid mt-4">