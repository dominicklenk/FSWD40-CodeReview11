<?php
require_once 'dbconnect.php';
?>

<!--            --------     hided     start HTML            -------           -->
<!-- html, and the div container -->
<!-- ?php include('navbar.php'); ? -->

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
	<h1 class = \"mt-5\">Have a look at our range of cars</h1>
	<table class='table table-striped table-responsive mt-3'>
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
                                             // define color for availability of the cars styled then in css

           		$output .= "<tr>";
        		$output .= "<td>".$x."</td>";
        		$output .= "<td><img src=\"".$row['car_img']."\" style='width: 100px'></td>";
        		$output .= "<td>".$row['car_brand']." ".$row['car_model']."<br>".$row['build_year']."</td>";
        		
        		$output .= "<td>".$row['description']."<br></td>";
        		
                $output .= "<td> &euro; ".str_replace('.',',',$row['car_dailyprice'])."</td>";
                                               // replace the . with , and set € before price
                $output .= "<td style=\"color:".$color."\">".$row['status']."<br></td>";
                                               // setting colors for availability instyle with variable
                $output .= "<td>".$row['c_address']."<br></td>";
                $output .= "</tr>";      
                $x++;
            }
            $output .= "</tbody></table></div>";

echo $output;
echo "<hr>";
?>

<!--         --------   hided   start of footer & end div & html         -------           -->
<!-- ?php include('footer.php'); ? -->