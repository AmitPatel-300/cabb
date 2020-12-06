var html;
$(document).ready(function(){
    function showallride(){
        var x='AllRide';
        html='<p  class="text text-dark">All Ride</p>';
        html+='<table class="table table-bordered table-info text-dark text-center">';
        html+='<tr><select class="filterride"><option >filter By </option><option value="week">filter By week </option><option value="month">Filter By month </option></tr>';
        html+='<tr><select class="sortride"><option >Sort By </option><option value="sbdatedesc2">Sort date By descending order </option><option value="sbfare2">Sort By fare </option><option value="sbfare3">Sort By fare DESC</option><option value="sbctype2">Sort By Cabtype</option><option value="sbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr class="table table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
        $.ajax({
            url: 'action.php',
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
    

    $(document).on("change",".sortride",function(){
        id=$(this).val();
        if(id=="sbdatedesc2"){
          x="sbdatedesc2";
        }
        else if(id=='sbtd2'){
         x="sbtd2";   
        }
        else if(id=='sbfare2'){
            x='sbfare2';
        }
        else if(id=='sbfare3'){
            x='sbfare3';
        }
        else{
          x="sbctype2";
        }
      html='<p  class="text text-dark">All Ride</p>';
        html+='<table class="table table-bordered table-info text-dark text-center">';
        html+='<tr><select class="filterride"><option >filter By </option><option value="week">filter By week </option><option value="month">Filter By month </option></tr>';
        html+='<tr><select class="sortride"><option >Sort By </option><option value="sbdatedesc2">Sort date By descending order </option><option value="sbfare2">Sort By fare ASC</option><option value="sbfare3">Sort By fare DESC</option><option value="sbctype2">Sort By Cabtype</option><option value="sbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr class="table table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
      $.ajax({
          url: 'action.php',
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

      $(document).on("change",".filterride",function(){
        id=$(this).val();
        if(id=="week"){
          x="week";
        }
        else{
          x="month";
        }
         html='<p  class="text text-dark">All Ride</p>';
        html+='<table class="table table-bordered table-info text-dark text-center">';
        html+='<tr><select class="filterride"><option >filter By </option><option value="week">filter By week </option><option value="month">Filter By month </option></tr>';
        html+='<tr><select class="sortride"><option >Sort By </option><option value="sbdatedesc2">Sort date By descending order </option><option value="sbfare2">Sort By fare</option><option value="sbctype2">Sort By Cabtype</option><option value="sbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr class="table table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th></tr>';
      $.ajax({
          url: 'action.php',
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

    function pendingRIDE(){
        var x='PenRide';
        html='<p  class="text text-dark">Pending Ride</p>';
        html+='<table class="table table-bordered table-info text-center">'
          html+='<tr><select class="psortride"><option >Sort By </option><option value="psbdatedesc2">Sort date By descending order </option><option value="psbfare2">Sort By fare ASC</option><option value="psbfare3">Sort By fare DESC</option><option value="psbctype2">Sort By Cabtype</option><option value="psbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr  class="table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th>Action</th></tr>';
        $.ajax({
            url: 'action.php',
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
                    '</td><td><input type="button" class="cancelride" data-id='+data[i]['ride_id']+' value="cancel"></td>';
                    }
                    html+='</tr>';
                    html+='</table>';
                    $('#showdata').html(html);
            }
        });
    }

    $('#PR').click(function(){
       pendingRIDE();
    });

    $(document).on("change",".psortride",function(){
        id=$(this).val();
        if(id=="psbdatedesc2"){
          x="psbdatedesc2";
        }
        else if(id=='psbtd2'){
         x="psbtd2";   
        }
        else if(id=='psbfare2'){
            x='psbfare2';
        }
        else if(id=='psbfare3'){
            x='psbfare3';
        }
        else{
          x="psbctype2";
        }
        html='<p  class="text text-dark">Pending Ride</p>';
        html+='<table class="table table-bordered table-info text-center">'
          html+='<tr><select class="psortride"><option >Sort By </option><option value="psbdatedesc2">Sort date By descending order </option><option value="psbfare2">Sort By fare ASC</option><option value="psbfare3">Sort By fare DESC</option><option value="psbctype2">Sort By Cabtype</option><option value="psbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr  class="table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare (INR)</th><th>Action</th></tr>';
     $.ajax({
          url: 'action.php',
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
                '</td><td><input type="button" class="cancelride" data-id='+data[i]['ride_id']+' value="cancel"></td>';
                }
                html+='</tr>';
                html+='</table>';
                $('#showdata').html(html);
        }
          });
    
      });


    $(document).on("click",'.cancelride',function(){
        var id=$(this).data('id');
        var x=confirm("Do to want to cancel ride ");
    if(x==1)
    {
        var x='cancelride';
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                name: x,RId:id
            },
            success: function(data) {
                if(data==1)
                {       
              pendingRIDE();
              alert("Cancellation Successful"); 
                }
            }
            });
        }
    });

    $('#PR1').click(function(){
        pendingRIDE();
    });
    
    $(document).on("click",'.accept',function(){
        var id=$(this).data('id');
        var x='RideStatus';
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                name: x,Id:id
            },
            success: function(data) {
                if(data==1)
                {   
                  showallride();
                }
            }
            });
    
    });
    
    $(document).on("click",'.reject',function(){
        var id=$(this).data('id');
        var x='RejectStatus';
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                name: x,Id:id
            },
            success: function(data) {
                if(data==1)
                {   
                  showallride();
                }
            }
            });
    
    });
    
    function completedRide(){
        var x='ComRide';
        html='<p  class="text text-dark">Completed Ride</p>';
        html+='<table class="table table-bordered table-info text-center">';
        html+='<tr><select class="csortride"><option >Sort By </option><option value="csbdatedesc2">Sort date By descending order </option><option value="csbfare2">Sort By fare ASC</option><option value="csbfare3">Sort By fare DESC</option><option value="csbctype2">Sort By Cabtype</option><option value="csbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr class="table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare(INR)</th></tr>';
        $.ajax({
            url: 'action.php',
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

    $(document).on("change",".csortride",function(){
        id=$(this).val();
        if(id=="csbdatedesc2"){
          x="csbdatedesc2";
        }
        else if(id=='csbtd2'){
         x="csbtd2";   
        }
        else if(id=='csbfare2'){
            x='csbfare2';
        }
        else if(id=='csbfare3'){
        x='csbfare3';
        }
        else{
          x="csbctype2";
        }
      html='<p  class="text text-dark">Completed Ride</p>';
        html+='<table class="table table-bordered table-info text-center">';
        html+='<tr><select class="csortride"><option >Sort By </option><option value="csbdatedesc2">Sort date By descending order </option><option value="csbfare2">Sort By fare ASC</option><option value="csbfare3">Sort By fare DESC</option><option value="csbctype2">Sort By Cabtype</option><option value="csbtd2">Sort By Total_Distance</option></select></tr>';
        html+='<tr class="table-light text-dark"><th>Ride_date</th><th>From</th><th>To</th><th>Cabtype</th><th>Total_distance(km)</th><th>luggage(kg)</th><th>total fare(INR)</th></tr>';
         $.ajax({
          url: 'action.php',
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
    
    $('#CR').click(function(){
       completedRide();
    });
    
    $('#CR1').click(function(){
  completedRide();
    });
   
    function showinfo(){
        html='<p  class="text text-dark">User Info</p>';
        html+='<table class="table table-bordered table-info text-center">';
        html+='<tr  class="table-light text-dark"><th>UserName</th><th>Name</th><th>Mobile No.</th><th>Action</th></tr>';   
        var x="UpdateInfo"
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                name: x
            },
            dataType:"json",
            success: function(data) {
                for(i=0;i<data.length;i++){
                    html+='<tr>';
                    html+='<td>'+data[i]['user_name']+'</td><td><input type="text" id="NAME" class="name"  onkeypress="return event.charCode >= 65 && event.charCode <= 122" value="'+data[i]['name']+'">\
                    </td><td><input class="mob" type="number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" min="1" value='+data[i]['mobile']+
                    '></td><td><input type="button" class="up" data-id='+data[i]['user_id']+' value="update"></td>';
                    }
                    html+='</tr>';
                    html+='</table>';
                    $('#showdata').html(html);
            }
        });
    }

    $("#UI").click(function(){
      showinfo();
    });
 

  
    $(document).on("click",'.up',function(){
        var id=$(this).data('id');
        var n=$('.name').val();
        var mob=$('.mob').val();
        if(n==''){
            return false;
        }
        if(mob==''){
            return false;
        }
        var x='update';
        $.ajax({
            url: 'action.php',
            type: 'POST',
            data: {
                name: x,Id:id,
                Name:n,MOB:mob
            },
            success: function(data) {
                alert("Information Updated");
                if(data==1)
                {   
                  showinfo();
                }
            }
            });
    
    });

    function updatepass(){
        html='<table class="table table-bordered table-info text-center">';
        html+='<tr  class="table-light text-dark"><th>Old Password</th><th>New Password</th><th>Action</th></tr>';
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
        var x='CPass';
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
         url: 'action.php',
         type: 'POST',
         data: {
             name: x,OLDPASS:oldpass,NEWPASS:newpass
         },
         success: function(data) {
    
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
