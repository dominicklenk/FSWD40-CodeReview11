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

<!--            --------    hided      start HTML            -------           -->
<!-- html, and the div container -->
<!-- ?php include('navbar.php'); ? -->


<?php
$q_loc = "SELECT * FROM current_location
		INNER JOIN car ON current_location.c_loc_id=car.fk_c_loc_id
		";

$r_loc = $conn->query($q_loc);
if (!$r_loc) {
	echo "query failed!";
	} 

$output = "";
$rows_loc = $r_loc->fetch_all(MYSQLI_ASSOC);
$output .= "
<div class='container'>
	<h1 class = \"mt-5\">Get the location of our cars</h1>
	<table class='table table-striped table-responsive mt-3'>
		<thead>
			<tr>
				<th></th>
				<th>address</th>
				<th></th>
				<th>cars at this address</th>
			</tr>
		</thead>
	<tbody>";
            $x=1;
           foreach($rows_loc as $row){
           		$output .= "<tr>";
        		$output .= "<td>".$x."</td>";
        		$output .= "<td>".$row['c_address']."<br></td>";
                $output .= "<td><a href=\"https://www.google.com/maps/@".$row['c_lat'].",".$row['c_lnt'].",15z\" target=\"_blank\">Find in Google Maps</a></td>";
                $output .= "<td>".$row['car_brand']." ".$row['car_model']."<br></td>";
                $output .= "</tr>";      
                $x++;
            }
            $output .= "</tbody></table></div>";

echo $output;
echo "<hr>";
?>

<!--         --------   hided   start of footer & end div & html         -------           -->
<!-- ?php include('footer.php'); ? -->