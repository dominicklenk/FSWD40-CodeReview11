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

<!--            --------           start HTML                   -------           -->
<!-- html, and the div container -->
<?php include('navbar.php'); ?>

<?php

        $result = $conn->query("SELECT address,COUNT(address) AS 'noc' FROM office GROUP BY address;");


        $cperloc = $result->fetch_all(MYSQLI_ASSOC);

        $output .= "
        <div class='container'>
        <h1 class = \"mt-5\">Here you find the cars per location</h1>
        <table class='table table-striped table-responsive mt-3'>
        <thead>
            <tr>
                <th></th>
                <th>Location</th>
                <th>Cars per location</th>
                <th></th>
            </tr>
        </thead>
    <tbody>";

            foreach($cperloc as $row){
                $output .= "<tr>";
                $output .= "<td>".$x."</td>";
                $output .= "<td>".$row['address']."</td>";
                $output .= "<td>".$row['noc']. " ". "car(s)" . "</td>";
                $output .= "</tr>";

            }
            $output .= "</tbody></table></div>";

echo $output;

?>

<!--         --------      start of footer & end div & html         -------           -->
<?php include('footer.php'); ?>