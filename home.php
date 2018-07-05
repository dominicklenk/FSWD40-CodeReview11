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

<!-- 1 Section -->
<section class="mt-4 mb-3 text-center">
  <div>
	<img class="img-fluid rounded-circle" src="img/office.jpg" alt="shaking hands" style=" height: 350px">
  </div>
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#officewindow" onclick="getoffices()">
Have a look on our officelocations
</button>

<!-- 1 Modal -->
<div class="modal fade" id="officewindow" tabindex="2" role="dialog" aria-labelledby="Our Officelocations" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Locations of our offices</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="offices">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>

<!-- 2 Section -->
<section class="float-left mt-3 mode">
<div>
  <img class="img-fluid rounded-circle" src="img/insidecar.jpg" alt="inside of car" style=" height: 350px">
  </div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#carwindow" onclick="getcar()">
Search for your car
</button>

<!-- 2 Modal -->
<div class="modal fade" id="carwindow" tabindex="2" role="dialog" aria-labelledby="Our Cars list" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Take your time choosing your car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="cars">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>

<!-- 3 Section -->
<section class="float-right mt-3">
<div>
  <img class="img-fluid rounded-circle" src="img/carlocation.jpg" alt="plan and lens" style=" height: 350px">
  </div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#carlocwindow" onclick="getcarlocation()">
Take a look for the carlocations
</button>

<!-- 3 Modal -->
<div class="modal fade" id="carlocwindow" tabindex="2" role="dialog" aria-labelledby="The carlocations" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Location of our cars</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="locations">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>



<script>

  function getoffices(){
        var obj, dbParam, xmlhttp;
        obj = {}; 
        dbParam = JSON.stringify(obj); 
        xmlhttp = new XMLHttpRequest();
             // creates a new XMLHttpRequest object
        xmlhttp.onreadystatechange = function() {
              // defines function called when readyState property change
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("offices").innerHTML = this.responseText;
            }
        };          // type of request: GET or POST
        xmlhttp.open("GET", "office_list.php?officelist=" + dbParam, true);
                                                                // true (asynchronous) or false (synchronous)
        xmlhttp.send();  // Sends the request to the server (used for GET)
        }

        function getcar(){
        var obj, dbParam, xmlhttp;
        obj = {}; 
        dbParam = JSON.stringify(obj); 
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cars").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "cars_list.php?carslist=" + dbParam, true); 
        xmlhttp.send(); 
        }


        function getcarlocation(){
          var obj, dbParam, xmlhttp;
          obj = {}; 
          dbParam = JSON.stringify(obj); 
          xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("locations").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET", "cars_locations.php?locations=" + dbParam, true); 
          xmlhttp.send();
          }




        

</script>

<!--         --------      start of footer & end div & html         -------           -->

<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>