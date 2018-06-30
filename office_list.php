<?php
ob_start();
session_start();
require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
}

	// select logged-in user detail
$res=mysqli_query($conn, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


?>

<!-- HTML -->


<!DOCTYPE html>
<html lang="en">
<head>
<title>Offices list - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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
    <li class="form-inline my-2 my-lg-0">
      <span class="mr-5">Hello <?php echo $userRow['user_name']; ?></span>
      <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php?logout"><i class="fas fa-sign-out-alt">&nbsp;</i>Log Out</a>
    </ul>
  </div>
</nav>
<!-- navbar end-->


<?php
$q_offices = "SELECT * FROM office";

$r_offices = $conn->query($q_offices);
if (!$r_offices) {
	echo "query failed!";
	} 

$output = "";
$rows_offices = $r_offices->fetch_all(MYSQLI_ASSOC);
$output .= "
<div class='container'>
	<h1 class = \"mt-5\">KLENK car rental offices</h1>
	<table class='table table-striped table-responsive'>
		<thead>
			<tr>
				<th></th>
				<th>address</th>
				<th>phone</th>
				<th></th>
			</tr>
		</thead>
	<tbody>";
            $x=1;
           foreach($rows_offices as $row){
           		$output .= "<tr>";
        		$output .= "<td>".$x."</td>";
        		$output .= "<td>".$row['address']."<br></td>";
                $output .= "<td>".$row['phone']."</td>";
                $output .= "<td><a href=\"https://www.google.com/maps/@".$row['office_lat'].",".$row['office_lnt'].",15z\" target=\"_blank\">Find in Google Maps</a></td>";
                $output .= "</tr>";      
                $x++;
            }
            $output .= "</tbody></table></div>";

echo $output;
echo "<hr>";
?>


</body>
</html>