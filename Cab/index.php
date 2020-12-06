<?php
include 'location.php';
session_start();
if (!empty($_SESSION['ride'])) {
   $from = $_SESSION["ride"]["from"];
   $to = $_SESSION["ride"]["to"];
   $distance = $_SESSION["ride"]["distance"];
   $luggage = $_SESSION["ride"]["luggage"];
   $fare = $_SESSION["ride"]["fare"];
   $status  = $_SESSION["ride"]["status"];
   $cabtype  = $_SESSION["ride"]["cabtype"];
}

$locate=new location();
$array=$locate->location();
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="cab.css">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Cab Fare</title>
   </head>
   <body>
   <header class="footcolor">
         <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand text-white font-weight-bold hcol2" href="#"><span class="ml-4 hcol1">CED</span><span class="hcol"> CAB</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto text-center mr-3">
            
                  <li class="nav-item">
                  <a class="nav-link text border border-primary rounded text-white mr-1" href="#">ABOUT US<span class="sr-only">(current)</span></a>
                  </li>
                  <?php if(!isset($_SESSION['UN']['username'])):?>
                  <li class="nav-item dropdown">
                  <a class="nav-link text border border-primary rounded text-white mr-1" href="login.php?flag=1">SignIn<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link text border border-primary rounded text-white mr-1" href="SignUp.php">SignUp<span class="sr-only">(current)</span></a>
                  </li>
                  <?php endif?>
                  <?php if(isset($_SESSION['UN']['username'])):?>
                     <li class="nav-item dropdown">
                  <a class="nav-link text border border-primary rounded text-white mr-1" href="User/User_dashboard.php?flag=0">Home<span class="sr-only">(current)</span></a>
                  </li>
                  <?php endif?>
               </ul>
            </div>
         </nav>
      </header>
      <div class="container-fluid image pb-5">
         <p class="h2  font-weight-bold text-center pb-4">Book a City Taxi To Your destination in Town</p>
         <!-- <p class="h3 text-white text-center pt-1 pb-3">Choose From a range of categories and prices</p> -->
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-12  col-md-6 col-xs-12 ">
                  <form class="bg-white round border mr-2 mb-4 pt-4">
                     <div class="form-group text-center">
                        <span class="logo ">CITY TAXI</span>
                     </div>
                     <div class="form-group">
                        <p class="text text-center font-weigCopyrightht-bold">Your Everyday Travel Partner</p>
                        <h6 class="text text-center font-weight-lighter">AC Cabs for point to point travel </h6>
                     </div>
                     <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                           <label class="input-group-text ml-2 dis bgco font-weight-lighter">pickUp</label>
                        </div>
                        <select class="form-control mr-2 dis bgco" id="pick">
                           <option>Current location</option>
                           <?php foreach($array as $key => $value){?>
                           <option value="<?php echo $key?>"><?php echo $key?></option>
                           <?php
                           }
                           ?>
                        </select>
                     </div>
                     <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                           <label class="input-group-text ml-2 dis bgco font-weight-lighter">drop</label>
                        </div>
                        <select class="form-control mr-2 dis bgco" id="drop" >
                        <option>Current location</option>
                           <?php foreach($array as $key => $value){?>
                           <option value="<?php echo $key?>"><?php echo $key?></option>
                           <?php
                           }
                           ?>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text ml-2 bgco dis ">Cab type</label>
                        </div>
                        <select class="form-control mr-2 dis bgco" id="cab">
                           <option value="cab">Select your cab</option>
                           <option value="CedMicro">CedMicro</option>
                           <option value="CedMini">CedMini</option>
                           <option value="CedRoyal">CedRoyal</option>
                           <option value="CedSUV">CedSUV</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text ml-2 bgco dis ">luggage</label>
                        </div>
                        <input type="number" min="1" id="lugg" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  type = "number"
                         maxlength = "3"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control dis mr-2 bgco" placeholder="Enter  Weight in KG">
                     </div>
                     <div class="form-group ml-2 mr-2 mb-0">
                        <input type="button" id="cal" class="btn btncolor mb-2" value="Calculate Fare" data-toggle="modal" data-target="#myModal">
                     </div>
                  </form>
               </div>
                <div>   
                        
                        <?php if(isset($_SESSION['ride'])):?>
                           <div class="card pl-5 pr-5 prev" id="mymodal">
                           <div class="card-header text-center">
                             Ticket Info
                           </div>
                           <div class="card-body pl-5 pr-5 mt-1 mb-1">
                           <h5 class="card-title text-center" id="from"><label>From : <?php  echo $from ?></label></h5>
                           <h5 class="card-title text-center" id="to"><label>To : <?php  echo $to ?></label></h5>
                           <h5 class="card-title text-center" id="ct"><label>Cabtype : <?php  echo $cabtype ?></label></h5>
                           <h5 class="card-title text-center" id="ct"><label>Distance : <?php  echo $distance." km. " ?></label></h5>
                           <h5 class="card-title text-center" id="lugg"><label>luggage : <?php if($luggage>0):?><?php echo $luggage." Kg."?><?php endif?>..</label></h5>
                           <h5 class="card-title text-center"><label>Fare :<?php  echo " INR.".$fare?></label></h5>
                           <a href="User/User_dashboard.php" 
                           class="text text-white"><button type="button" class="btn btn-success mt-2" >Book Now</button></a>
                           <a href="cancel.php"
                           class="text text-white"><button type="button"  class="btn btn-danger mt-2 cancel">Cancel</button></a>
                           </div>
                           </div>
                        </p><?php endif?>
                 </div> 
               <div id="myModal" class="modal fade mt-4" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content text text-center">
                <p class="h3">Total Fare :</p>
               <div class="modal-body">
               <p id="cost" style="text-align:center;font-size:30px"></p>
               </div>
               <div class="modal-footer">
                 <a href='#' class="text text-white"><button type="button" class="btn btn-success mt-2"  id="showdetails" data-toggle="modal" data-target="#myModal">Show Details</button>
                  <a href="cancel.php"
                     class="text text-white"><button type="button"  class="btn btn-danger mt-2 cancel">Cancel</button>
                  </a>
               </div>
               </div>
               </div>
               </div>
            </div>
         </div>
      </div>
      <script rel="javascript" src="cab.js"></script>
      <?php include 'footer.php'?>
   </body>

</html>