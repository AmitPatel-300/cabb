<?php
include_once 'user.php';
if(isset($_GET['flag'])){
if(isset($_SESSION['ride'])){
  session_destroy();
}  
}
if(isset($_SESSION['UN']['username'])) {
	header('location:User/User_dashboard.php');
}
if(isset($_SESSION['Admin']['Adminname'])) {
	header('location:Admin/index.php');
}

$User=new user();
if(isset($_POST['Login'])) {
  $uname=isset($_POST['uname'])?$_POST['uname']:'';
  $pass=md5(isset($_POST['pass'])?$_POST['pass']:'');
  $User->login($uname,$pass);
}

$expireAfter = 3;

if(isset($_SESSION['last_action'])){
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        session_unset();
        session_destroy();
    }
    
}

$_SESSION['last_action'] = time();

?>
<!DOCTYPE html>
<html>
<head>
	<title>CED_CAB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'header.php';?>
<div class="main3">
<link rel="stylesheet" type="text/css" href="style.css">
		<div id="showdata">
		<form action="" method="POST">   
			<p><label for="username">Username :</label>
			<input type="text" name="uname" <?php if(isset($_COOKIE["UN"])):?> value="<?php echo $_COOKIE["UN"]?>"<?php endif?> required></p>
			<p><label for="Password">Password :</label>
			<input type="password" name="pass" required></p>
			<p><input type="submit" value="Login" name="Login"></p>
		</form>
		</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</div>
</body>
<?php include 'footer.php'?>
  </html>