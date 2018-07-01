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

<!--            --------          start HTML            -------           -->
<!-- html, and the div container -->
<?php include('navbar.php'); ?>


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
	<h1 class = \"mt-5\">Here is an overview of our rental offices</h1>
	<table class='table table-striped table-responsive mt-3'>
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
                								// finding the specific coordinates on google maps after clicking on link!
                $output .= "</tr>";      
                $x++;
            }
            $output .= "</tbody></table></div>";

echo $output;
echo "<hr>";
?>

<!--         --------      start of footer & end div & html         -------           -->
<?php include('footer.php'); ?>