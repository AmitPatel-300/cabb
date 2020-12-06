<?php 
session_start();
include '../ride.php';
include_once '../location.php';
if(isset($_GET['flag'])){
	unset($_SESSION['ride']);
}

$id =  $_SESSION['UN']['user_id'];
if($_SESSION['UN']['username']=='') {
	header('location:../login.php');
}

if (isset($_SESSION['ride'])) {
$from = $_SESSION["ride"]["from"];
$to = $_SESSION["ride"]["to"];
$distance = $_SESSION["ride"]["distance"];
$luggage = $_SESSION["ride"]["luggage"];
$fare = $_SESSION["ride"]["fare"];
$status  = $_SESSION["ride"]["status"];
$cabtype  = $_SESSION["ride"]["cabtype"];
$ride=new ride();
$data = $ride->insertdata($from,$to,$distance,$luggage, $fare, $status,$cabtype,$id);
if($data=="Inserted") {
	unset($_SESSION['ride']);
}
}

$loc=new location();	
$pr=$loc->pendingRideUSER($id);
$tr=$loc->completedRideUSER($id);
$ar=$loc->AllRideUSER($id);
$totalcost=$loc->cost2($id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>CED_CAB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<?php include 'header2.php';?>
<div class="main2">
<link rel="stylesheet" type="text/css" href="../style.css">
<div id="showdata" class = "container pt-4">
		<div class="row">
				<div class="col">
				<div class="card bg-dark" style="width:18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-white tiles2">Pending Rides</li>
					<li class="list-group-item  text-center text-white tiles2"><?php echo $pr?></li>
					<li class="list-group-item tiles2">
					<a id="PR1" style="background:none" href="#" class="text-center text-white">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card bg-dark" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-white tiles2">Completed Rides</li>
					<li class="list-group-item  text-center text-white tiles2" id="pending_rides"><?php echo $tr?></li>
					<li class="list-group-item tiles2"  >
					<a id="CR1" style="background:none" href="#" class="text-center text-white">you can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card bg-dark" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-white tiles2" >All Rides</li>
					<li class="list-group-item  text-center text-white tiles2" ><?php echo $ar?></li>
					<li class="list-group-item  text-center text-white tiles2" ><a id="AR1" style="background:none" href="#" class="text-center text-white">you can see more in menus</a></li>
				</ul>
				</div>
				</div>
            </div>
			<div class="row mt-3">
				<div class="col">
				<div class="card bg-dark" style="width: 18rem;">
				<ul class="list-group list-group-flush" >
					<li class="list-group-item text-center text-white tiles2">Total Expenses</li>
					<li class="list-group-item text-center text-white tiles2"><?php echo $totalcost?></li>
					<li class="list-group-item text-center text-white tiles2">IN INR</li>
	            </ul>
				</div>
				</div>
            </div>
		
			</div>
			<html>
			
			</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script rel="javascript" src="user.js"></script>
</div>
</body>
<?php include '../footer.php';?>
</html>