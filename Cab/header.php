<?php
?>
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
    <?php if(isset($_SESSION['ride'])):?>
      <a href="index.php" style="background:none" class="text text-white"><button class="mr-2" style="font-size:22px;color:white;
      background-color:transparent;border-color:green;">
     Back <i class="fa fa-arrow-left"></i></button>
      <?php endif?>
    <li class="nav-item active">
        <a class="nav-link text border border-success rounded text-white mr-2" href="index.php">Book Now<span class="sr-only">(current)</span></a>
	  </li>
      <li class="nav-item active">
        <a class="nav-link text border border-success rounded text-white" href="SignUp.php">SignUp<span class="sr-only">(current)</span></a>
	  </li>
    </ul>
  </div>
</nav>

	<a></a>  
	</header>	