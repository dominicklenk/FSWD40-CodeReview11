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
<title>Cars list - <?php echo $userRow['email']; ?></title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style2.css">
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
$q_offices = "
	SELECT * FROM car

			INNER JOIN current_location ON car.fk_c_loc_id = current_location.c_loc_id
";

$r_offices = $conn->query($q_offices);
if (!$r_offices) {
	echo "query failed!";
	} 

$output = "";
$rows_offices = $r_offices->fetch_all(MYSQLI_ASSOC);
$output .= "
<div class='container'>
	<h1 class = \"mt-5\">KLENK cars list</h1>
	<table class='table table-striped table-responsive'>
		<thead>
			<tr>
				<th></th>
				<th>picture</th>
				<th>model/year</th>
				<th>description</th>
				
				<th>dailyprice</th>
				<th>status</th>
				<th>location</th>
			</tr>
		</thead>
	<tbody>";
            $x=1;
           foreach($rows_offices as $row){

           		$color = 'red';
           		if($row['status'] == 'available') $color = 'green';

           		$output .= "<tr>";
        		$output .= "<td>".$x."</td>";
        		$output .= "<td><img src=\"".$row['car_img']."\" style='width: 100px'></td>";
        		$output .= "<td>".$row['car_brand']." ".$row['car_model']."<br>".$row['build_year']."</td>";
        		
        		$output .= "<td>".$row['description']."<br></td>";
        		
                $output .= "<td> &euro; ".str_replace('.',',',$row['car_dailyprice'])."</td>";
                $output .= "<td style=\"color:".$color."\">".$row['status']."<br></td>";
                $output .= "<td>".$row['c_address']."<br></td>";
                $output .= "</tr>";      
                $x++;
            }
            $output .= "</tbody></table></div>";

echo $output;
echo "<hr>";
?>


</body>
</html>