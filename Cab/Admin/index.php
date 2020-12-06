<?php 
require_once '../ride.php';
include '../user.php';
if($_SESSION['Admin']['Adminname']=='') {
	header('location:../login.php');
}
$ride=new ride();
$pr=$ride->pending();
$cr=$ride-> cancelled();
$tr=$ride->completed();
$ar=$ride->AllRide();
$user=new user();
$pur=$user->PenReq();
$aur=$user->AppReq();
$allr=$user->AllReq();
$totalcost=$ride->cost();
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
<div class="main23">
</style>
	
<link rel="stylesheet" type="text/css" href="../style.css">
      
		<div id="showdata" class = "container pt-4">
			
		<div class="row">
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-light tiles">All Rides</li>
					<li class="list-group-item  text-center text-light tiles"><?php echo $ar?></li>
					<li class="list-group-item  text-center text-light tiles">
					<a id="AR1" href="#" class="text-center text-white tiles" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-light tiles">Pending Rides</li>
					<li class="list-group-item  text-center text-light tiles"  id="pending_rides"><?php echo $pr?></li>
					<li class="list-group-item  text-center text-light tiles" >
					<a id="PR1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-light tiles" >Cancelled Rides</li>
					<li class="list-group-item  text-center text-light tiles" ><?php echo $cr?></li>
					<li class="list-group-item  text-center text-light tiles" >
					<a id="CanR1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
            </div>
				<div class="row mt-3">

				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush ">
					<li class="list-group-item  text-center text-white tiles" >Completed Rides</li>
					<li class="list-group-item  text-center text-white tiles" ><?php echo $tr?></li>
					<li class="list-group-item  text-center text-white tiles" >
					<a id="CR1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					<li class="list-group-item  text-center text-white  tiles" >Pending User Request</li>
					<li class="list-group-item  text-center text-white  tiles" ><?php echo $pur?></li>
					<li class="list-group-item  text-center text-white  tiles" >
					<a id="PUR1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
				<li class="list-group-item  text-center text-white  tiles" >Approved User Request</li>
					<li class="list-group-item  text-center text-white tiles" ><?php echo $aur?></li>
					<li class="list-group-item  text-center text-white tiles" >
					<a id="AUR1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
		
		</div>
		        <div class="row mt-3">

		         <div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
				<li class="list-group-item text-center text-white  tiles" >All Request</li>
					<li class="list-group-item text-center text-white  tiles" ><?php echo $allr?></li>
					<li class="list-group-item text-center text-white  tiles" >
					<a id="ALLUSER1" href="#" class="text-center text-white" style="background:none">You can see more in menus</a></li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					<li class="list-group-item text-center text-white tiles" >Total Users</li>
					<li class="list-group-item text-center text-white tiles" ><?php echo $allr?></li>
					<li class="list-group-item text-center text-white tiles">You can see more in menus</li>
				</ul>
				</div>
				</div>
				<div class="col">
				<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
				<li class="list-group-item text-center text-white tiles" >Total Earning</li>
					<li class="list-group-item text-center text-white tiles" ><?php echo $totalcost?></li>
					<li class="list-group-item text-center text-white tiles" >In INR</li>
				</ul>
				</div>
				</div>
		
		</div>
		
		</div> 
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<script rel="javascript" src="admin.js"></script>
</div>
</div>
</body>
<?php include '../footer.php';?>
</html>
