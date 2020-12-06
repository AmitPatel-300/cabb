<?php
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-dark pt-4 pb-4">
  <p class="h3 font-weight-bold"><span id="ced" class="mt-2">CED</span > <span id="cab">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text text-white" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
	  </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Rides
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="PR" href="#">Pending Rides</a>
          <a class="dropdown-item" id="CR" href="#">Completed Rides</a>
          <a class="dropdown-item" id="CanR" href="#">Cancelled Rides</a>
          <a class="dropdown-item" id="AR" href="#">All Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="PUR" href="#">Pending User Request </a>
          <a class="dropdown-item" id="AUR" href="#">Approved user Request</a>
          <a class="dropdown-item" id="ALLUSER" href="#">All Users</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         location 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="location" href="#" >location list </a>
          <a class="dropdown-item"  id="Addlocation">Add new location</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="CP" href="#">Change Password</a>
        </div>
	  </li>
    <li>
      <i class='fas fa-user-alt text text-white mr-2 pt-1' style='font-size:24px'>
      <?php echo $_SESSION['Admin']['name']?></i>
      </li>
	  <li class="nav-item active">
         <a href="../logout.php"><button type="button" class="btn btn-success">Logout</button>
     
        <!-- <a class="nav-link text border border-primary rounded-pill text-white" href="../logout.php">Logout<span class="sr-only">(current)</span></a> -->
	  </li>
    </ul>
  </div>
</nav>

	<a></a>  
	</header>	