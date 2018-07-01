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


<h1 class="text-center">Welcome to the PHP car rental agency!</h1>





<!--         --------      start of footer & end div & html         -------           -->

<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>