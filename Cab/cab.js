var pick = "current";
var drop = "current";
var cab = "cab";
var lugg;

$(document).ready(function() {
    $('#cab').change(function() {
        cab = $(this).val();
        $("#lugg").val('');
        if (cab == 'CedMicro') {
            $("#lugg").prop("disabled", true);
            alert("luggage is not allowed");
        } else {
            $("#lugg").prop("disabled", false);
        }
    });

    $('#cal').click(function() {
        var name="Show";
        $('.prev').hide();
        pick = $('#pick').val();
        drop = $('#drop').val();
        cab = $('#cab').val();
        if (cab == 'CedMicro') {
            $("#lugg").prop("disabled", true);
        } else {
            $("#lugg").prop("disabled", false);
        }
        
        
        if (pick == "current") {  
            alert('please choose pickup point');
            return false;
        }
        if (drop == "current") {
            $('#fare').hide();
            alert('please choose drop point');
            return false;
        } else if (drop == pick) {
            $('#fare').hide();
            alert('pickup and drop point are same');
            return false;
        } else if (cab == "cab") {
            alert('please choose cab');
            return false;
        }
        if(cab=="CedMicro"){
            $('#lugg').val('');   
        }
        var lugg = $('#lugg').val();

        if (isNaN(lugg)) {
            alert("enter luggage value in numeric");
            $('#lugg').val('');
        }
       
        else {
            $.ajax({
                url: 'CabFare.php',
                type: 'POST',
                data: {
                    PICK: pick,
                    DROP: drop,
                    CAB: cab,
                    LUGG: lugg,
                    Name:name
                },
                success: function(data) {
                    $('#cost').text( data + ' INR.');
                }
            });
        }
    });
    
    $('#showdetails').click(function(){
        var name="BOOK";
        $('.prev').hide();
        pick = $('#pick').val();
        drop = $('#drop').val();
        cab = $('#cab').val();
        if (cab == 'CedMicro') {
            $("#lugg").prop("disabled", true);
        } else {
            $("#lugg").prop("disabled", false);
        }
        
        
        if (pick == "current") {  
            alert('please choose pickup point');
            return false;
        }
        if (drop == "current") {
            $('#fare').hide();
            alert('please choose drop point');
            return false;
        } else if (drop == pick) {
            $('#fare').hide();
            alert('pickup and drop point are same');
            return false;
        } else if (cab == "cab") {
            alert('please choose cab');
            return false;
        }
        if(cab=="CedMicro"){
            $('#lugg').val('');   
        }
        var lugg = $('#lugg').val();

        if (isNaN(lugg)) {
            alert("enter luggage value in numeric");
            $('#lugg').val('');
        }
       
        else {
            $.ajax({
                url: 'CabFare.php',
                type: 'POST',
                data: {
                    PICK: pick,
                    DROP: drop,
                    CAB: cab,
                    LUGG: lugg,
                    Name:name
                },
                success: function(data) {
                    $('#cost').text( data + ' INR.');
                }
            });
        }
        
        window.location.href='index.php';
    });

    $('.cancel').click(function(){
      $('#mymodal').hide();
    });

    
});