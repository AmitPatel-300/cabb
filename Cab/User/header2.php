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
        <a class="nav-link text text-white" href="User_dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
	  </li>
	  <li class="nav-item active">
        <a class="nav-link text text-white" href="../index.php">Book New Ride <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Rides
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" a id="PR" href="#">Pending</a>
          <a class="dropdown-item" a id="CR" href="#">Completed Rides</a>
          <a class="dropdown-item" a id="AR" href="#">All Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="UI" href="#">Update Information</a>
          <a class="dropdown-item" id="CP" href="#">Change Password</a>
        </div>
	  </li>
	  
	  <li>
      <i class='fas fa-user-alt text text-white mr-2 pt-1' style='font-size:24px'>
      <?php echo $_SESSION['UN']['username']?></i>
      </li>
      <li class="nav-item text-white">
       <a href="../logout.php"><button type="button" class="btn btn-info">Logout</button>
	  </li>
    </ul>
  </div>
</nav>

	<a></a>  
	</header>	