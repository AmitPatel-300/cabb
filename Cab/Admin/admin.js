var html;
$(document).ready(function(){
function showlocation(){
    var x='showlocation';
    html='<p class="text-dark">Location</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortloc"><option >Sort By </option><option value="sbl">Sort By Location</option><option value="sbd">Sort By Distance</option></select></tr>';
    html+='<tr class="table table-info  table-bordered text-dark"><th>Location</th><th>Distance(km)</th><th>Status</th><th colspan="2">Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                
                if(data[i]['is_available']==1){
                    status="Available";
                }
                else{
                    status="Not Available";
                }
                html+='<tr>';
                html+='<td>'+data[i]['name']+'</td><td>'+data[i]['distance']+
                '</td><td>'+status+
                '</td><td><input type="button" style="width:70px;background-color:#94BB46 " class="edit" data-id='+data[i]['id']+' value="edit"></td><td><input type="button" style="background-color:#E12E39 " class="delete" data-id='+data[i]['id']+' value="delete"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
       
    });
}

 $(document).on("change",".sortloc",function(){
      id=$(this).val();
      if(id=="sbl"){
        x="sbl";
      }
      else{
        x="sbd";
      }
      html='<p class="text-dark">Location</p>';
     html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortloc"><option >Sort By </option><option value="sbl">Sort By Location</option><option value="sbd">Sort By Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Location</th><th>Distance(km)</th><th>Status</th><th colspan="2">Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['name']+'</td><td>'+data[i]['distance']+
                '</td><td>'+status+
                '</td><td><input type="button" style="width:70px;background-color:#94BB46" class="edit" data-id='+data[i]['id']+' value="edit"></td><td><input type="button" class="delete" style="background-color:#E12E39 " data-id='+data[i]['id']+' value="delete"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
        });

    });


$('#location').click(function(){
    showlocation();
});

$(document).on("click",'.edit',function(){
    var id=$(this).data('id');
    var x='editlocation';
    html='<table class="table table-bordered table-light text-center">';
    html+='<tr class="table-info text-dark"><th>Location</th><th>Distance(km)</th><th>Is_avalable</th><th>Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td><input class="ulname" type="text" id="name" value='+data[i]['name']+' ></td><td><input class="udis" type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  value='+data[i]['distance']+'></td><td><select class="uisa" style="width:150px"><option value=0>Not_available</option><option value=1>Available</option></select><td><input type="button" class="uploc" data-id='+data[i]['id']+' value="Update"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
        });
});

$(document).on("keypress","#name",function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}

$(document).on("click",'.uploc',function(){
    var id=$(this).data('id');
    var location=$('.ulname').val();
    var distance=$('.udis').val();
    var isa=$('.uisa').val();
    if(location==''){
        return false;
    }
    if(distance==''){
        return false;
    }
    var x="updatelocation";
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id,uloc:location,
            udis:distance,uIsa:isa
        },
        success: function(data) {
            if(data==1)
            {   
              showlocation();
            }
        }
        });

});


$(document).on("click",'.delete',function(){
    var x=confirm("Are uou sure do you delete");
    if(x==1)
    {
    var id=$(this).data('id');
    var x='deletelocation';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        success: function(data) {
            if(data==1)
            {   
                showlocation();
            }
        }
        });
    }
});

$('#Addlocation').click(function(){
    html='<p class="text-dark">Add New Location</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr class="table-info text-dark"><th>location</th><th>Distance(km)</th><th>Is Available</th><th>Action</th></tr>';
    html+='<tr>';
    html+='<td><input type="text" id="name" class="lname" placeholder="location name"></td><td><input type="number" placeholder="distance in km" min="1" class="dis">\
    </td><td><select class="isa" style="width:150px"><option value=0>Not_Available</option><option value=1>Available</option></select></td><td><input type="button" class="add" value="Add"></td>';
    html+='</tr>';
    html+='</table>';
    $('#showdata').html(html);
       
    });

$(document).on('click','.add',function(){
       var location=$('.lname').val();
       var distance=$('.dis').val();
       var isa=$('.isa').val();
       if(location==''){
        return false;
       }
    if(distance==''){
        return false;
    }
    if(isa==''){
        return false;
    }
       var x='addlocation';
       $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,loc:location,
            dis:distance,Isa:isa
        },
        success: function(data) {
            if(data==1)
            {
               showlocation();
            }
        }
        });
});



function showallride(){
   var x='AllRide';
    html='<p class="text-dark">All Ride</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortride"><option >Sort By </option><option value="sbdatedesc">Sort date By descending order </option><option value="sbfare">Sort By fare</option><option value="sbctype">Sort By Cabtype</option><option value="sbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr><select class="allfilterride"><option >filter By </option><option value="allweek">filter By week </option><option value="allmonth">Filter By month </option></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
                '</td>'
                '</td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}

 $(document).on("change",".allfilterride",function(){
        id=$(this).val();
        if(id=="allweek"){
          x="allweek";
        }
        else{
          x="allmonth";
        }
    html='<p class="text-dark">All Ride</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortride"><option >Sort By </option><option value="sbdatedesc">Sort date By descending order </option><option value="sbfare">Sort By fare</option><option value="sbctype">Sort By Cabtype</option><option value="sbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr><select class="allfilterride"><option >filter By </option><option value="allweek">filter By week </option><option value="allmonth">Filter By month </option></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
       $.ajax({
          url: 'Adminaction.php',
          type: 'POST',
          data: {
              name: x
          },
          dataType:"json",
          success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
                '</td>'
                '</td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
          });
    
      });

$(document).on("click",".receipt",function(){
    var id=$(this).data('id');
    x="receipt";
    html='<p class="text-dark">CED_CAB RIDE INVOICE</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr class="table-info text-dark"><th colspan="2">Ride Date</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,ID:id
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr><th>Ride Date</th><td>'+data[i]['ride_date']+'</td></tr>';
                html+='<tr><th>From</th><td>'+data[i]['From']+'</td></tr>';
                html+='<tr><th>To</th><td>'+data[i]['To']+'</td></tr>';
                html+='<tr><th>Cabtype</th><td>'+data[i]['cabtype']+'</td></tr>';
                html+='<tr><th>Distance</th><td>'+data[i]['total_distance']+'</td><tr>';
                html+='<tr><th>Lugguage</th><td>'+data[i]['luggage']+' kg.</td></tr>';
                html+='<tr><th>Fare</th><td>'+data[i]['total_fare']+'</td><tr>';
        }
        html+='</tr><td><input type="submit" onclick="window.print();"value="Generate"></td></tr>'
        html+='</table>';
        $('#showdata').html(html);
    }
});
});


$(document).on("change",".sortride",function(){
    id=$(this).val();
    if(id=="sbdatedesc"){
      x="sbdatedesc";
    }
    else if(id=='sbtd'){
     x="sbtd";   
    }
    else if(id=='sbfare'){
        x='sbfare';
    }
    else{
      x="sbctype";
    }
    html='<p class="text-dark">All Ride</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortride"><option >Sort By </option><option value="sbdatedesc">Sort date By descending order </option><option value="sbfare">Sort By fare</option><option value="sbctype">Sort By Cabtype</option><option value="sbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr><select class="allfilterride"><option >filter By </option><option value="allweek">filter By week </option><option value="allmonth">Filter By month </option></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
  $.ajax({
      url: 'Adminaction.php',
      type: 'POST',
      data: {
          name: x
      },
      dataType:"json",
      success: function(data) {
        for(i=0;i<data.length;i++){
            html+='<tr>';
            html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
            '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
            '</td><td>'+data[i]['total_distance']+
            '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
            '</td>';
            }
            html+='</tr>';
            html+='</table>';
            $('#showdata').html(html);
    }
      });

  });


$('#AR').click(function(){
    showallride();
});

$('#AR1').click(function(){
    showallride();
});

function PendingRide(){
    var x='PenRide';
    html='<p style="text-align:center;font-weight:bold;font-size:25px" class="text-dark">Pending Ride </p>';
    html+='<table class="table table-bordered table-light text-center">';
      html+='<tr><select style="width:200px" class="psortride"><option >Sort By </option><option value="psbdatedesc">Sort date By descending order </option><option value="psbfare">Sort By fare</option><option value="pbctype">Sort By Cabtype</option><option value="psbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th colspan="2">Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
                '</td><td><input type="button" class="accept bg-success" data-id='+data[i]['ride_id']+' value="accept"></td><td><input type="button"  class="reject bg-danger" data-id='+data[i]['ride_id']+' value="reject"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}

$('#PR').click(function(){
   PendingRide();
});

$(document).on("change",".psortride",function(){
    id=$(this).val();
    if(id=="psbdatedesc"){
      x="psbdatedesc";
    }
    else if(id=='psbtd'){
     x="psbtd";   
    }
    else if(id=='psbfare'){
        x='psbfare';
    }
    else{
      x="psbctype";
    }


    html='<p style="text-align:center;font-weight:bold;font-size:25px" class="text-dark">Pending Ride </p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="psortride"><option >Sort By </option><option value="psbdatedesc">Sort date By descending order </option><option value="psbfare">Sort By fare</option><option value="pbctype">Sort By Cabtype</option><option value="psbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th colspan="2">Action</th></tr>';
  $.ajax({
      url: 'Adminaction.php',
      type: 'POST',
      data: {
          name: x
      },
      dataType:"json",
      success: function(data) {
         for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
                '</td><td><input type="button" class="accept bg-success" data-id='+data[i]['ride_id']+' value="accept"></td><td><input type="button"  class="reject bg-danger" data-id='+data[i]['ride_id']+' value="reject"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
      });

  });


$(document).on("click",'.accept',function(){
    var id=$(this).data('id');
    var x='RideStatus';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        success: function(data) {
            if(data==1)
            {   
             PendingRide();
            }
        }
        });

});

$(document).on("click",'.reject',function(){
    var id=$(this).data('id');
    var x=confirm("Are you sure do you want to reject");
    if(x==1)
    {
    var x='RejectStatus';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        success: function(data) {
            if(data==1)
            {   
            PendingRide();
            }
        }
        });
    }
});

$('#PR1').click(function(){
  PendingRide();
});


function completedRide(){
    var x='ComRide';
    html='<p class="text-dark">Complete Ride </p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="csortride"><option >Sort By </option><option value="csbdatedesc">Sort date By descending order </option><option value="csbfare">Sort By fare</option><option value="cbctype">Sort By Cabtype</option><option value="csbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th>Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+'<td><input type="button" class="receipt" data-id='+data[i]['ride_id']+' value="receipt"></td>'
                '</td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}

$('#CR').click(function(){
  completedRide();
});

$(document).on("change",".csortride",function(){
    id=$(this).val();
    if(id=="csbdatedesc"){
      x="csbdatedesc";
    }
    else if(id=='csbtd'){
     x="csbtd";   
    }
    else if(id=='csbfare'){
        x='csbfare';
    }
    else{
      x="csbctype";
    }
    html='<p class="text-dark">Complete Ride </p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="csortride"><option >Sort By </option><option value="csbdatedesc">Sort date By descending order </option><option value="csbfare">Sort By fare</option><option value="cbctype">Sort By Cabtype</option><option value="csbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th>Action</th></tr>';
  $.ajax({
      url: 'Adminaction.php',
      type: 'POST',
      data: {
          name: x
      },
      dataType:"json",
      success: function(data) {
        for(i=0;i<data.length;i++){
            html+='<tr>';
            html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
            '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
            '</td><td>'+data[i]['total_distance']+
            '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+'<td><input type="button" class="receipt" data-id='+data[i]['ride_id']+' value="receipt"></td>'
            '</td>';
            }
            html+='</tr>';
            html+='</table>';
            $('#showdata').html(html);
    }
      });

  });

$('#CR1').click(function(){
   completedRide();
});

function cancelride(){
    var x='CanRide';
    html='<p class="text-dark">Cancelled Ride</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="cansortride"><option >Sort By </option><option value="cansbdatedesc">Sort date By descending order </option><option value="cansbfare">Sort By fare</option><option value="canbctype">Sort By Cabtype</option><option value="csbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
                '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
                '</td><td>'+data[i]['total_distance']+
                '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
                '</td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}

$('#CanR').click(function(){
   cancelride();
});

$(document).on("change",".cansortride",function(){
    id=$(this).val();
    if(id=="cansbdatedesc"){
      x="cansbdatedesc";
    }
    else if(id=='cansbtd'){
     x="cansbtd";   
    }
    else if(id=='cansbfare'){
        x='cansbfare';
    }
    else{
      x="cansbctype";
    }
    html='<p class="text-dark">Cancelled Ride</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="cansortride"><option >Sort By </option><option value="cansbdatedesc">Sort date By descending order </option><option value="cansbfare">Sort By fare</option><option value="canbctype">Sort By Cabtype</option><option value="csbtd">Sort By Total_Distance</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';  $.ajax({
      url: 'Adminaction.php',
      type: 'POST',
      data: {
          name: x
      },
      dataType:"json",
      success: function(data) {
        for(i=0;i<data.length;i++){
            html+='<tr>';
            html+='<td>'+data[i]['ride_date']+'</td><td>'+data[i]['From']+
            '</td><td>'+data[i]['To']+'</td><td>'+data[i]['cabtype']+
            '</td><td>'+data[i]['total_distance']+
            '</td><td>'+data[i]['luggage']+'</td><td>'+data[i]['total_fare']+
            '</td>';
            }
            html+='</tr>';
            html+='</table>';
            $('#showdata').html(html);
    }
      });

  });

$('#CanR1').click(function(){
   cancelride();
});



function showrequest(){
    var x='AllReq';
    html='<p class="text-dark">All User</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortuser"><option >Sort By </option><option value="sbn">Sort By Name</option><option value="sbdos">Sort By DateOfSignUp</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Username</th><th>Name</th><th>Date Of SignUp</th><th>Mobile</th><th>Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['user_name']+'</td><td>'+data[i]['name']+
                '</td><td>'+data[i]['dateofsignup'];
                if (data[i]['is_admin']==1){
                    html+='</td><td>'+data[i]['mobile']+'</td><td>--------</td>';
                
                }
                else {
                    html+='</td><td>'+data[i]['mobile']+'</td><td><input type="button" class="deluser" style="background-color:red" data-id='+data[i]['user_id']+' value="Delete">';
                }
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}

$(document).on("click",".deluser",function(){
    id=$(this).data('id');
    var x=confirm("Are you sure do you want to delete");
    if(x==1)
    {
    x="deluser";
    html='<p class="text-dark">All User</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortuser"><option >Sort By </option><option value="sbn">Sort By Name</option><option value="sbdos">Sort By DateOfSignUp</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Username</th><th>Name</th><th>Date Of SignUp</th><th>Mobile</th><th>Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,ID:id
        },
        dataType:"json",
        success: function(data) {
           if(data==1){
               showrequest();
           }
        } 
});
    }
});

$(document).on("change",".sortuser",function(){
    id=$(this).val();
    if(id=="sbn"){
      x="sbn";
    }
    else{
      x="sbdos";
    }
    html='<p class="text-dark">All User</p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr><select style="width:200px" class="sortuser"><option >Sort By </option><option value="sbn">Sort By Name</option><option value="sbdos">Sort By DateOfSignUp</option></select></tr>';
    html+='<tr class="table-info text-dark"><th>Username</th><th>Name</th><th>Date Of SignUp</th><th>Mobile</th><th>Action</th></tr>';
  $.ajax({
      url: 'Adminaction.php',
      type: 'POST',
      data: {
          name: x
      },
      dataType:"json",
      success: function(data) {
          for(i=0;i<data.length;i++){
              html+='<tr>';
              html+='<td>'+data[i]['user_name']+'</td><td>'+data[i]['name']+
              '</td><td>'+data[i]['dateofsignup'];
              if (data[i]['is_admin']==1){
                  html+='</td><td>'+data[i]['mobile']+'</td><td>--------</td>';
              
              }
              else {
                  html+='</td><td>'+data[i]['mobile']+'</td><td><input type="button" class="deluser" style="background-color:red" data-id='+data[i]['user_id']+' value="Delete">';
              }
              }
              html+='</tr>';
              html+='</table>';
              $('#showdata').html(html);
      }
  });
  });

$('#ALLUSER').click(function(){
showrequest( );  
});

$('#ALLUSER1').click(function(){
    showrequest( );  
    });


function pendingRequest(){
    var x='PenReq';
    html='<p class="text-dark">Pending User Request </p>';
     html+='<table class="table table-bordered table-light text-center">';
     html+='<tr class="table-info text-dark"><th>Username</th><th>Name</th><th>Mobile</th><th>Action</th></tr>';
     $.ajax({
         url: 'Adminaction.php',
         type: 'POST',
         data: {
             name: x
         },
         dataType:"json",
         success: function(data) {
             for(i=0;i<data.length;i++){
                 html+='<tr>';
                 html+='<td>'+data[i]['user_name']+'</td><td>'+data[i]['name']+
                 '</td><td>'+data[i]['mobile']+'</td><td><input type="button" class="acc_req" data-id='+data[i]['user_id']+' value="accept">';
                 }
                 html+='</tr>';
                 html+='</table>';
                 $('#showdata').html(html);
         }
     });
}


$('#PUR').click(function(){
   pendingRequest();
 });


$('#PUR1').click(function(){
   pendingRequest();
 });

$(document).on("click",'.acc_req',function(){
    var id=$(this).data('id');
    var x='RequestStatus';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        success: function(data) {
            if(data==1)
            {   
            pendingRequest();
            }
        }
        });

});

function APPROVEDUSER(){
    var x='AppReq';
    html='<p class="text-dark">Approved User Request </p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr class="table-info text-dark"><th>Username</th><th>Name</th><th>Mobile</th><th>Action</th></tr>';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x
        },
        dataType:"json",
        success: function(data) {
            for(i=0;i<data.length;i++){
                html+='<tr>';
                html+='<td>'+data[i]['user_name']+'</td><td>'+data[i]['name']+
                '</td><td>'+data[i]['mobile']+'</td><td><input type="button" class="reject_req" data-id='+data[i]['user_id']+' value="blocked">';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
    });
}
$('#AUR').click(function(){
   APPROVEDUSER();
});

$(document).on("click",'.reject_req',function(){
    var id=$(this).data('id');
    var x='RejectRequestStatus';
    $.ajax({
        url: 'Adminaction.php',
        type: 'POST',
        data: {
            name: x,Id:id
        },
        success: function(data) {
            if(data==1)
            {   
             APPROVEDUSER();
            }
        }
        });

});


$('#AUR1').click(function(){
   APPROVEDUSER();
});


function updatepass(){
    html='<p class="text-dark">Change Password </p>';
    html+='<table class="table table-bordered table-light text-center">';
    html+='<tr class="table-info text-dark"><th >Old Password</th><th>New Password</th><th>Action</th></tr>';
    html+='<tr>';
    html+='<td><input type="text" class="oldpass"></td><td><input type="text" class="newpass"></td><td><input type="button" class="up_pass " value="Update"></td>';
    html+='</tr>';
    html+='</table>';
    $('#showdata').html(html);
}
$('#CP').click(function(){
    updatepass();
});

$(document).on('click','.up_pass',function(){
    var x='ChangePass';
    var oldpass=$('.oldpass').val();
    var newpass=$('.newpass').val();
    if(oldpass==newpass){
        alert("Password Already Set");
        $('.oldpass').val('');
        $('.newpass').val('');
        return false;
    }
    if(oldpass==''){
        return false;
    }
    if(newpass==''){
        return false;
    }
    $.ajax({
     url: 'Adminaction.php',
     type: 'POST',
     data: {
         name: x,OLDPASS:oldpass,NEWPASS:newpass
     },
     success: function(data) {
        //  alert(data);
         if(data==1)
         {
             alert("password updated successfully");
              updatepass();
              window.location.href="../logout.php";
         }
         if(data==0)
         {
             alert("Incorrect old Password");
             updatepass();
         }
     }
     });
});


});
