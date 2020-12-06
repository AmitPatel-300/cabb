<?php

include_once 'user.php';
if(isset($_SESSION['UN']['username'])) {
	header('location:User/User_dashboard.php');
}
if(isset($_SESSION['Admin']['Adminname'])) {
	header('location:Admin/index.php');
}
$User=new user();
if(isset($_POST['SignUp'])) {
  $uname=isset($_POST['uname'])?$_POST['uname']:'';
  $name=isset($_POST['uname'])?$_POST['name']:'';
  $mob=isset($_POST['uname'])?$_POST['mob']:'';
  $pass=md5(isset($_POST['uname'])?$_POST['pass']:'');
  $repass=md5(isset($_POST['uname'])?$_POST['repass']:'');
   if($pass!=$repass) {
	   echo '<script>alert("Password Not Match")</script>';
   }
   else{
   	$User->insert($uname,$name,$mob,$pass);
   }

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CED_CAB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'headersign.php';?>
<div class="main" style="background-color:#f2f2f2">
<link rel="stylesheet" type="text/css" href="style.css">
		<div id="showdata"> 
		    <form action="" method="POST"> 
			<p><label for="username">Username :</label>
			<input type="text" name="uname" required=""></p>
			<p><label for="name">Name :</label><span style="margin-left:25px">
			<input type="text" name="name" id="Name" onblur="this.value=removeSpaces(this.value)" required></span></p>
			<p><label for="mobileno">Mobile No.:</label>
			<input type="number" name="mob" min="1"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="" maxlength="10"></p>
			<p><label for="Password">Password :</label>
			<input type="password" name="pass" required=""></p>
			<p><label for="RePasword">RePassword:</label>
			<input type="password" name="repass" required=""></p>
			<p><input type="submit" value="SignUp" name="SignUp" ></p>
		</form>
<script>
$(document).ready(function(){
   $("#Name").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
	});
	
function removeSpaces(string) {
 return string.split(' ').join('');
}    
    function isValid(str) {
        return !/[~`!0123456789@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
    }
});
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script rel="javascript" src="user.js"></script> -->
  </div>
</div>
</body>
<?php include 'footer.php'?>
  </html>